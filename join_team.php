<?php
include 'db.php'; // Include your DB connection

// Check if the user is logged in
session_start();

if (!isset($_SESSION['user_id'])) {
    // Return an error message in JSON format
    echo json_encode(["success" => false, "message" => "You must be logged in."]);
    exit;
}

// Get the data sent via AJAX
$team_id = isset($_POST['team_id']) ? (int)$_POST['team_id'] : null;
$user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : null;

if (!$team_id || !$user_id) {
    echo json_encode(["success" => false, "message" => "Invalid team ID or user ID."]);
    exit;
}

try {
    // Check if the user is already a member of the team
    $query = "SELECT * FROM team_members WHERE team_id = :team_id AND user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':team_id', $team_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // User is already a member
        echo json_encode(["success" => false, "message" => "You are already a member of this team."]);
        exit;
    }

    // If the user is not a member, insert the user into the team
    $query = "INSERT INTO team_members (team_id, user_id) VALUES (:team_id, :user_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':team_id', $team_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Return a success message in JSON format
    echo json_encode(["success" => true, "message" => "Successfully joined the team!"]);
} catch (PDOException $e) {
    // Handle the error and return an error message in JSON format
    echo json_encode(["success" => false, "message" => "Unexpected error: " . $e->getMessage()]);
}
?>
