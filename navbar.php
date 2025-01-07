<nav class="nav">
    <div class="nav-logo">
        <img src="images/logo3.png" alt="logo">
    </div>
    <div class="nav-menu">
        <ul>
            <li><a href="home.html" class="link">Home</a></li>
            <li><a href="games.html" class="link">Games</a></li>
            <li><a href="friends.html" class="link">Friends</a></li>
            <li><a href="about.html" class="link">About Us</a></li>
            <li><a href="profile.php" class="link">My Account</a></li>
        </ul>
    </div>
    <div class="nav-button">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <form action="logout.php" method="POST">
                <button class="btn" type="submit">Log Out</button>
            </form>
        <?php else: ?>
            <button class="btn" id="loginBtn" onclick="login()">Log In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        <?php endif; ?>
    </div>
    <div class="nav-menu-btn">
        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
    </div>
</nav>
