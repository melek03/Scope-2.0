<?php

$host = "localhost";
$port = "1950";
$dbname = "Scope";
$user = "postgres";
$password = "torcida1950";

try {
    // Establish the PDO connection
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Catch and display any connection error
    die("Error connecting to database: " . $e->getMessage());
}

// Query to fetch all games from the database
$queryGames = "SELECT game_name, game_image FROM Game";
$stmtGames = $pdo->prepare($queryGames);

try {
    $stmtGames->execute();
    $games = $stmtGames->fetchAll(PDO::FETCH_ASSOC);  // Fetch all the games
} catch (PDOException $e) {
    // Catch and display any query execution error for games
    echo "Error executing query for games: " . $e->getMessage();
}

// Query to fetch all teams from the database
$queryTeams = "SELECT * FROM team";  // Query to fetch all teams
$stmtTeams = $pdo->prepare($queryTeams);

try {
    $stmtTeams->execute();
    $teams = $stmtTeams->fetchAll(PDO::FETCH_ASSOC);  // Fetch all the teams
} catch (PDOException $e) {
    // Catch and display any query execution error for teams
    echo "Error executing query for teams: " . $e->getMessage();
}

?>
