<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && !empty($_SESSION["profile"])) {
    $profile_email = $dbh->getEmail($_SESSION["profile"]);
    $templateParams["posts"] = $dbh->getProfilePosts($profile_email);
    $templateParams["profile"] = $dbh->getUser($profile_email);

    $templateParams["title"] = "Revly - Profile";
    $templateParams["top-template"] = "profile-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
