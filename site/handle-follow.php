<?php
require_once("bootstrap.php");
session_start();
// Esempio di handle-follow.php
$userId = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $follow = $dbh->isFollowed($_SESSION["profile_email"], $_SESSION["email"]);
    $queryResult = $dbh->follow($_SESSION["email"], $_SESSION["profile_email"]);
    if(!$follow){
        $dbh->addNotify(NULL, $_SESSION["email"], 1, $_SESSION["profile_email"]);
    }
    echo json_encode(['follow' =>!$follow]);
}
?>
