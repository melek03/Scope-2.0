<?php
include 'db.php'; // Include the DB connection
include 'navbar.php'; // Include the navbar (session check and login/logout logic)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Friends - Scope</title>
</head>
<body>
    <div class="wrapper">
        
        <h2>Friends Page</h2>
        <div class="page-content">
            <div class="header">
                <div class="icons">
                    <button class="friends-button" ><ion-icon name="people"></ion-icon></button>
                    <button class="friends-button" ><ion-icon name="person-add"></ion-icon></button>
                    <button class="friends-button"><ion-icon name="chatbubble"></ion-icon></button>
                </div>
            </div>


        </div>
        <!-- Friends content goes here -->
        <footer><p>&copy; 2024 Scope</p></footer>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
