<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["posts"] = $dbh->getProfilePosts($_SESSION["email"]);
    $templateParams["profile"] = $dbh->getUserWithEmail($_SESSION["email"]);

    $templateParams["title"] = "Revly - Your profile";
    $templateParams["top-template"] = "profile-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
