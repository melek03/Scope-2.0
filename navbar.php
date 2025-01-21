<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']); // If 'user_id' is in session, the user is logged in
?>

<nav class="nav">
    <div class="nav-logo">
        <img src="images/logo3.png" alt="Logo">
    </div>
    <div class="nav-menu">
        <ul>
            <li><a href="home.php" class="link">Home</a></li>
            <li><a href="games.php" class="link">Games</a></li>
            <li><a href="friends.php" class="link">Friends</a></li>
            <li><a href="about.php" class="link">About</a></li>
            <li><a href="profile.php" class="link"><i class='bx bxs-user-circle' style="font-size: 30px;"></i></a></li>
        </ul>
    </div>

    <div class="nav-button">
        <?php if ($isLoggedIn): ?>
            <!-- Display user info and logout button if the user is logged in -->
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        <?php else: ?>
            <!-- Display login and register buttons if the user is not logged in -->
            <button class="btn" id="loginBtn" onclick="login()">Log In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        <?php endif; ?>
    </div>
</nav>

<script>
    function login() {
        window.location.href = 'index.php'; // Redirect to index.php for login
    }

    function register() {
        window.location.href = 'index.php'; // Redirect to index.php for register
    }

    // Update active link in navbar based on current page URL
    const links = document.querySelectorAll('.nav-menu .link');
    links.forEach(function(link) {
        if (window.location.href.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
</script>
