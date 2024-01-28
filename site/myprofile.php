<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $profile = $dbh->getUserWithEmail($_SESSION["email"]);
    $templateParams["profile"] = $profile;
    $posts = $dbh->getProfilePosts($profile["email"]);
    foreach($posts as $p) {
        $p["liked"] = $dbh->isPostLiked($_SESSION["email"], $p["id_post"]);
    }
    $templateParams["posts"] = $posts;

    $templateParams["title"] = "Revly - Your profile";
    $templateParams["top-template"] = "profile-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
