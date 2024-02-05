<?php
require_once("bootstrap.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $res = $dbh->deletePost($_GET["idPost"]);
    header("Location: profile.php?username=" . $_SESSION["username"]);
}
?>
