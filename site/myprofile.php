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
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-profile.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
