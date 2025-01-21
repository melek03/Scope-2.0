<?php
include 'db.php'; // Include the DB connection
include 'navbar.php'; // Include the navbar (session check and login/logout logic)

// Fetch games from the database
$queryGames = "SELECT game_id, game_name, game_image FROM Game"; // Assuming your table is 'Game'
$stmtGames = $pdo->prepare($queryGames);
$stmtGames->execute();
$games = $stmtGames->fetchAll(PDO::FETCH_ASSOC);

// Fetch teams from the database
$queryTeams = "SELECT * FROM Team"; // Assuming your table is 'Team'
$stmtTeams = $pdo->prepare($queryTeams);
$stmtTeams->execute();
$teams = $stmtTeams->fetchAll(PDO::FETCH_ASSOC);

// Check if data is retrieved for games and teams
if (!$games) {
    die("Error: No games found.");
}

if (!$teams) {
    die("Error: No teams found.");
}

// Map games by their ID for easy lookup
$games_by_id = [];
foreach ($games as $game) {
    $games_by_id[$game['game_id']] = $game;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="gamesStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Games - Scope</title>
</head>
<body>
    <div class="wrapper">
        <div class="container swiper">
            <div class="card-wrapper">
                <ul class="card-list swiper-wrapper">
                    <?php foreach ($games as $game): ?>
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="images/<?php echo strtolower(str_replace(' ', '_', $game['game_image'])); ?>" alt="<?php echo htmlspecialchars($game['game_name']); ?>" class="card-image">
                                <h3><?php echo htmlspecialchars($game['game_name']); ?></h3>
                                <div class="buttons-container">
                                    <button class="heart-button"><i class='bx bx-heart'></i></button>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-slide-button swiper-button-prev"></div>
                <div class="swiper-slide-button swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div class="join-create-teams">
        <h2>Join/Create teams for:</h2>
        <div class="teams-list">
            <?php foreach ($teams as $team): ?>
                <?php
                    // Get the game associated with this team
                    $game = isset($games_by_id[$team['game_id']]) ? $games_by_id[$team['game_id']] : null;
                ?>
                <div class="team-item">
                    <h4><?php echo htmlspecialchars($team['team_name']); ?></h4>
                    <?php if ($game): ?>
                        <p><strong>Game:</strong> <?php echo htmlspecialchars($game['game_name']); ?></p>
                    <?php else: ?>
                        <p>No game associated with this team</p>
                    <?php endif; ?>
                    <p>Max Members: <?php echo $team['max_members']; ?></p>
                    <p>Members: <?php echo $team['member_count']; ?></p>
                    <button class="join-team-btn" data-team-id="<?php echo $team['team_id']; ?>">Join Team</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer><p>&copy; 2024 Scope</p></footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Activate nav-menu links
            if (!window.linksScriptLoaded) {
                window.linksScriptLoaded = true;

                const links = document.querySelectorAll('.nav-menu .link');
                links.forEach(function(link) {
                    if (window.location.href.includes(link.getAttribute('href'))) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }

            // Heart button toggle logic
            const heartButtons = document.querySelectorAll('.heart-button');
            heartButtons.forEach(function(button) {
                button.addEventListener('click', function () {
                    button.classList.toggle('active');
                });
            });

            // Join team button logic
            const joinTeamButtons = document.querySelectorAll('.join-team-btn');
            joinTeamButtons.forEach(function(button) {
                button.addEventListener('click', function () {
                    const teamId = button.getAttribute('data-team-id');
                    if (teamId) {
                        joinTeam(teamId);
                    }
                });
            });

            function joinTeam(teamId) {
                // Ensure the user is logged in
                <?php if (isset($_SESSION['user_id'])) { ?>
                    var userId = <?php echo $_SESSION['user_id']; ?>;

                    // Send an AJAX request to the PHP script
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "join_team.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            try {
                                var response = JSON.parse(xhr.responseText);  // Parse JSON response
                                if (response.success) {
                                    alert('Successfully joined the team!');
                                    location.reload();  // Reload the page to reflect the new team member count
                                } else {
                                    alert('Error: ' + response.message);
                                }
                            } catch (e) {
                                console.error("Error parsing JSON response:", e);
                                alert("Unexpected error occurred.");
                            }
                        } else if (xhr.readyState == 4) {
                            console.error("AJAX Request failed: " + xhr.status); // Log if the AJAX request fails
                            alert("AJAX request failed with status: " + xhr.status);
                        }
                    };
                    xhr.send("team_id=" + teamId + "&user_id=" + userId);
                <?php } else { ?>
                    alert('You need to log in to join a team!');
                <?php } ?>
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
