<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && $_SESSION["profile_email"]) {
    if (strcmp($_SESSION["profile_email"], $_SESSION["email"]) == 0) {
        header("Location: myprofile.php");
    }
    $profile = $dbh->getUserWithEmail($_SESSION["profile_email"]);
    if (count($profile) == 0) {
        $templateParams["title"] = "Revly - User not found";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "not-found.php";
        $templateParams["not-found"] = "user";
    }
    $templateParams["profile"] = $profile;
    $posts = $dbh->getProfilePosts($profile["email"]);
    foreach($posts as &$p) {
        $p["liked"] = $dbh->isPostLiked($_SESSION["email"], $p["id_post"]);
    }
    unset($p);
    $templateParams["posts"] = $posts;
    
    $templateParams["title"] = "Revly - " . $profile["username"] . "'s profile";
    $templateParams["top-template"] = "profile-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
