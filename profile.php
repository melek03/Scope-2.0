<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: index.html');
    exit();
}

// Retrieve user information from the session
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();  // Destroy the session
    header('Location: index.html');  // Redirect to index.html
    exit();  // Stop further script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>User profile - Scope</title>
</head>
<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <img src="images/logo3.png" alt="Logo">
            </div>
            <div class="nav-menu">
                <ul>
                    <li><a href="home.html" class="link">Home</a></li>
                    <li><a href="games.html" class="link">Games</a></li>
                    <li><a href="friends.html" class="link">Friends</a></li>
                    <li><a href="about.html" class="link">About</a></li>
                    <li><a href="profile.php" class="link active"><ion-icon name="person-circle-outline"></ion-icon></a></li>
                </ul>
            </div>
        </nav>
        
        <div class="profile-content">
            <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
            <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
            
            <form action="" method="post" class="logout-form">
                <button type="submit" name="logout" class="btn logout-btn">Logout</button>
            </form>
        </div>
        
        <footer><p>&copy; 2024 Scope</p></footer>
    </div>
</body>
</html>
