<?php
require 'db.php';
session_start();  // Start the session to store user data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Securely hash the password

    try {
        // Prepare SQL query to insert the user data
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $password
        ]);

        // Store user info in session after successful registration
        $_SESSION['user_name'] = $firstname . ' ' . $lastname;
        $_SESSION['user_email'] = $email;

        // Redirect to profile page after successful registration
        header('Location: profile.php');
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23505) { // Unique constraint violation (email already registered)
            echo "Email already registered!";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
