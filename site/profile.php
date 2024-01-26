<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && !empty($_SESSION["profile_email"])) {
    $profile = $dbh->getUserWithEmail($_SESSION["profile_email"]);
    $templateParams["profile"] = $profile;
    $templateParams["posts"] = $dbh->getProfilePosts($profile["email"]);
    if (strcmp($profile["email"], $_SESSION["email"]) == 0) {
        $templateParams["isFollowed"] = $dbh->isFollowed($profile["email"], $_SESSION["email"]);
    }
    $templateParams["title"] = "Revly - Profile";
    $templateParams["top-template"] = "profile-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
