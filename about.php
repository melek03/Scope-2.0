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
    <title>About - Scope</title>
</head>
<body>
    <div class="wrapper">

        <!-- About Us Banner Section -->
        <section class="about-banner">
            <div class="banner-content">
                <h4>
                    Scope is a web application designed to help users quickly and easily connect 
                    with other players and create teams for ranked matches. Our goal is to enhance the 
                    ranked gaming experience by facilitating seamless team formation and ensuring that 
                    players can find reliable teammates. We believe in the power of teamwork and collaboration, 
                    aiming to foster a community where players can not only compete but also grow together. 
                    Whether you're climbing the ranks or looking for your next challenge, Scope is here to help you 
                    build strong, dependable teams.
                </h4>

                <h2>
                    Meet the team behind scope:
                </h2>
            </div>
        </section>

        <!-- Team Members Section -->
        <section class="team-section">
            <div class="team-container">
                <!-- First Row -->
                <div class="team-row">
                    <div class="team-member" onclick="showPopup(this)" data-name="Mirjam Elek" data-description="Mirjam is a software engineer with a passion for gaming. She leads the development of our platform." data-instagram="https://instagram.com/mirjam" data-linkedin="https://linkedin.com/in/mirjam" data-github="https://github.com/mirjam" data-twitter="https://twitter.com/mirjam">
                        <img src="images/Mirjam.jpg" alt="Mirjam Elek" class="team-image">
                        <h3>Mirjam Elek</h3>
                    </div>
                    <div class="team-member" onclick="showPopup(this)" data-name="Marija Gašpar" data-description="Marija is a front-end developer focused on creating seamless user experiences." data-instagram="https://instagram.com/marija" data-linkedin="https://linkedin.com/in/marija" data-github="https://github.com/marija" data-twitter="https://twitter.com/marija">
                        <img src="images/mara.jpg" alt="Marija Gašpar" class="team-image">
                        <h3>Marija Gašpar</h3>
                    </div>
                    <div class="team-member" onclick="showPopup(this)" data-name="Nikolina Benutić" data-description="Nikolina is a data scientist with expertise in machine learning and AI." data-instagram="https://instagram.com/nikolina" data-linkedin="https://linkedin.com/in/nikolina" data-github="https://github.com/nikolina" data-twitter="https://twitter.com/nikolina">
                        <img src="images/Nikolina.jpg" alt="Nikolina Benutić" class="team-image">
                        <h3>Nikolina Benutić</h3>
                    </div>
                </div>
                <!-- Second Row -->
                <div class="team-row">
                    <div class="team-member" onclick="showPopup(this)" data-name="Nikolina Duvnjak" data-description="Nikolina is a UX/UI designer, ensuring our platform is both beautiful and functional." data-instagram="https://instagram.com/nikolina2" data-linkedin="https://linkedin.com/in/nikolina2" data-github="https://github.com/nikolina2" data-twitter="https://twitter.com/nikolina2">
                        <img src="images/Nikolina2.jpg" alt="Nikolina Duvnjak" class="team-image">
                        <h3>Nikolina Duvnjak</h3>
                    </div>
                    <div class="team-member" onclick="showPopup(this)" data-name="Marta Anastazija Komić" data-description="Marta is a backend developer who focuses on server-side architecture." data-instagram="https://instagram.com/marta" data-linkedin="https://linkedin.com/in/marta" data-github="https://github.com/marta" data-twitter="https://twitter.com/marta">
                        <img src="images/marta.jpg" alt="Marta Anastazija Komić" class="team-image">
                        <h3>Marta Anastazija Komić</h3>
                    </div>
                    <div class="team-member" onclick="showPopup(this)" data-name="Ana Ćosić" data-description="Ana is a product manager, ensuring everything runs smoothly and efficiently." data-instagram="https://instagram.com/ana" data-linkedin="https://linkedin.com/in/ana" data-github="https://github.com/ana" data-twitter="https://twitter.com/ana">
                        <img src="images/Ana.jpg" alt="Ana Ćosić" class="team-image">
                        <h3>Ana Ćosić</h3>
                    </div>
                </div>
            </div>
        </section>

        <footer><p>&copy; 2024 Scope</p></footer>
    </div>

    </script>
</body>
</html>
