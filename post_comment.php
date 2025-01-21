<?php
// Include database connection
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $comment = $_POST['comment'];
    $postId = $_POST['post_id'];
    $userId = 1;  // Replace with actual user ID, e.g., $_SESSION['user_id']

    // Sanitize the comment to prevent SQL injection
    $comment = htmlspecialchars($comment);
    
    // Ensure the comment is not empty
    if (!empty($comment)) {
        // Insert the comment into the database
        $query = "INSERT INTO comments (post_id, user_id, comment_text) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('iis', $postId, $userId, $comment);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "Comment posted successfully!";
        } else {
            echo "Error posting comment.";
        }
    } else {
        echo "Please enter a comment.";
    }
}
?>
