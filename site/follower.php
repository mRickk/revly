<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && isset($_GET["email"])) {
    $templateParams["title"] = "Revly - " . $_GET["email"] . "'s follower";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "show-line-user.php";
    $templateParams["users"] = $dbh->getFollower($_GET['email']);
    $templateParams["js"] = array("js/back.js");    
    require("template/base.php");
} else {
    header("Location: index.php");
}
?>