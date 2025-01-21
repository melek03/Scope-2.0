<?php

include 'navbar.php'; // Include the navbar (session check and login/logout logic)

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: index.html');
    exit();
}

// Retrieve user information from the session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();  // Destroy the session
    header('Location: index.html');  // Redirect to index.html
    exit();  // Stop further script execution
}

// Connect to the database
require 'db.php'; 

// Fetch user details from the database
$query = "SELECT firstname, lastname, profile_picture, users_username, users_favgame FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute([':user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $user_firstname = $user['firstname'];
    $user_lastname = $user['lastname'];
    $profile_picture = $user['profile_picture'] ?? 'images/default-profile.png';
    $user_username = $user['users_username'] ?? '';
    $user_fav_game = $user['users_favgame'] ?? '';
} else {
    die("User not found.");
}

// Retrieve teams the user is part of, along with the associated game from the team_members table
$query_teams = "
    SELECT t.team_name, g.game_name
    FROM team_members tm
    JOIN team t ON tm.team_id = t.team_id
    JOIN game g ON t.game_id = g.game_id
    WHERE tm.user_id = :user_id
";
$stmt_teams = $pdo->prepare($query_teams);
$stmt_teams->execute([':user_id' => $user_id]);
$teams = $stmt_teams->fetchAll(PDO::FETCH_ASSOC);

// Handle profile picture upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_picture'])) {
    // Process file upload
    $file = $_FILES['profile_picture'];
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($file['name']);
    
    // Check if the file is an image
    $check = getimagesize($file['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($file['tmp_name'], $upload_file)) {
            // Update the profile picture in the database
            $update_query = "UPDATE users SET profile_picture = :profile_picture WHERE user_id = :user_id";
            $stmt_update = $pdo->prepare($update_query);
            $stmt_update->execute([':profile_picture' => $upload_file, ':user_id' => $user_id]);

            // Update session with new profile picture path
            $_SESSION['profile_picture'] = $upload_file;
            header('Location: profile.php'); // Refresh the page to show the updated profile picture
            exit();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Handle saving username, favorite game, and bio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_details'])) {
    $username = trim($_POST['username']);
    $favorite_game = trim($_POST['favorite_game']);
    $bio = trim($_POST['bio']); // Optional: decide if you want to save this in the database
    
    // Update the database with username and favorite game
    $update_user_query = "UPDATE users SET users_username = :username, users_favgame = :favorite_game WHERE user_id = :user_id";
    $stmt_update_user = $pdo->prepare($update_user_query);
    $stmt_update_user->execute([
        ':username' => $username,
        ':favorite_game' => $favorite_game,
        ':user_id' => $user_id,
    ]);

    // Refresh the page to show the updated details
    header('Location: profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>User Profile - Scope</title>
</head>
<body>
    <div class="wrapperProfile">
        <div class="profile-content">
            
            <h1>Welcome, <?php echo htmlspecialchars($user_firstname . ' ' . $user_lastname); ?>!</h1>
            
            <!-- Profile Picture Section -->
            <div class="profile-content">
                <div class="profile-picture">
                    <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="max-width: 150px; max-height: 150px;">
                </div>              
            <!-- File Upload Form -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="file-upload">
                    <label for="file-upload" class="uploadBtn-label logout-btn">Choose File</label>
                    <input type="file" name="profile_picture" id="file-upload" accept="image/*" style="display: none;">
                    <span id="file-chosen">No file chosen</span>
                    <button type="submit" name="upload" class="logout-btn">Upload Picture</button>
                </div>
            </form>

            <!-- Username, Favorite Game, and Bio Form -->
            <form action="" method="post">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user_username); ?>" required>
                </div>
                
                <div class="input-group">
                    <label for="favorite-game">Favorite Game:</label>
                    <input type="text" name="favorite_game" id="favorite-game" value="<?php echo htmlspecialchars($user_fav_game); ?>" required>
                </div>
                
                <div class="input-group">
                    <label for="bio">Bio:</label>
                    <textarea name="bio" id="bio" rows="3" placeholder="Write a short bio about yourself..."><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                </div>
                
                <button type="submit" name="save_details" class="logout-btn">Save Details</button>
            </form>
            </div>

            <!-- Display teams the user is a part of -->
            <div class="user-teams">
                <h4>Your Teams:</h4>
                <ul>
                    <?php foreach ($teams as $team): ?>
                        <li><?php echo htmlspecialchars($team['team_name']) . " - " . htmlspecialchars($team['game_name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Logout Form -->
            <form action="" method="post" class="logout-form">
                <button type="submit" name="logout" class="btn logout-btn">Logout</button>
            </form>
        </div>

        <footer><p>&copy; 2024 Scope</p></footer>
    </div>

    <script>
        // Handle the file input change event to display the file name
        document.getElementById('profile_picture').addEventListener('change', function(event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : "No file chosen";
            document.getElementById('file-chosen').textContent = fileName;
        });

        // Handle the custom button click to open the file dialog
        document.getElementById('upload-btn').addEventListener('click', function() {
            document.getElementById('profile_picture').click(); // Trigger the file input
        });
    </script>
</body>
</html>
