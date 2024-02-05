<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $res = $dbh->deletePost($_GET["idPost"]);
    header("Location: profile.php?username=" . $_SESSION["username"]);
}
?>
