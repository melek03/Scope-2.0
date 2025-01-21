<?php
include('db.php');

if (isset($_GET['game_id'])) {
    $gameID = $_GET['game_id'];
    $teams = getTeamsByGameID($gameID, $pdo);
    echo json_encode($teams);
}
?>
