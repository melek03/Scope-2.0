<?php
include 'db.php'; // Include the DB connection
include 'navbar.php'; // Include the navbar (session check and login/logout logic)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Scope</title>
</head>
<body>
    <div class="wrapper">

        <div class="form-box">
            <!-- Login Form -->
            <div class="login-container" id="login">
                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Register</a></span>
                    <header>Log in</header>
                </div>
                <form action="login.php" method="POST">
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Sign in">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Forgot password?</a></label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Registration Form -->
            <div class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <form action="register.php" method="POST">
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" name="firstname" class="input-field" placeholder="Firstname" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="lastname" class="input-field" placeholder="Lastname" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Terms & conditions</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer><p>&copy; 2024 Scope</p></footer>
    
    <script>
        function myMenuFunction() {
            const menu = document.querySelector(".nav-menu");
            if (menu.classList.contains("responsive")) {
                menu.classList.remove("responsive");
            } else {
                menu.classList.add("responsive");
            }
        }

        function login() {
            const loginContainer = document.getElementById("login");
            const registerContainer = document.getElementById("register");
            const loginBtn = document.getElementById("loginBtn");
            const registerBtn = document.getElementById("registerBtn");

            loginContainer.style.left = "4px";
            registerContainer.style.right = "-520px";
            loginBtn.classList.add("white-btn");
            registerBtn.classList.remove("white-btn");
            loginContainer.style.opacity = 1;
            registerContainer.style.opacity = 0;
        }

        function register() {
            const loginContainer = document.getElementById("login");
            const registerContainer = document.getElementById("register");
            const loginBtn = document.getElementById("loginBtn");
            const registerBtn = document.getElementById("registerBtn");

            loginContainer.style.left = "-510px";
            registerContainer.style.right = "5px";
            registerBtn.classList.add("white-btn");
            loginBtn.classList.remove("white-btn");
            loginContainer.style.opacity = 0;
            registerContainer.style.opacity = 1;
        }
    </script>

    <script>
        const links = document.querySelectorAll('.nav-menu .link');

        links.forEach(function(link) {
            if (window.location.href.includes(link.getAttribute('href'))) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    </script>
    <script src="script.js"></script>
</body>
</html>
