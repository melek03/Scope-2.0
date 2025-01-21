<?php
include 'db.php';
include 'navbar.php'; // Include the navbar (session check and login/logout logic)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home - Scope</title>
</head>
<body>
    <div class="wrapper">
        <div class="home-container">
            <h1>Welcome to Scope!</h1>
            <p>Find your team and start gaming.</p>
            
            <div class="home-button">
                <button class="btn" id="joinTeamBtn" onclick="joinTeam()">Join Team</button>
            </div>    
        </div>
    </div>

    <footer><p>&copy; 2024 Scope</p></footer>

    <script>
        // Set the login status from the PHP session variable
        const isLoggedIn = <?php echo isset($isLoggedIn) && $isLoggedIn ? 'true' : 'false'; ?>;

        function joinTeam() {
            console.log('Join Team clicked. isLoggedIn:', isLoggedIn);
            if (isLoggedIn) {
                // Redirect to games.php if logged in
                window.location.href = 'games.php';
            } else {
                // Redirect to index.php if not logged in
                window.location.href = 'index.php';
            }
        }
    </script>
    <script src="script.js"></script>
</body>
</html>
