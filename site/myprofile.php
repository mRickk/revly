<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $profile = $dbh->getUserWithEmail($_SESSION["email"]);
    $templateParams["profile"] = $profile;
    $posts = $dbh->getProfilePosts($profile["email"]);
    for ($i = 0; $i < count($posts); $i++){
        $posts[$i]["liked"] = $dbh->isPostLiked($_SESSION, $posts[$i]["idPost"]);   
    }
    
    $templateParams["posts"] = $posts;

    $templateParams["title"] = "Revly - Your profile";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-profile.php";
    
    $profile["numFollowing"] = $dbh->getNumberFollows($profile["email"]);
    $profile["numFollower"] = $dbh->getNumberFollowers($profile["email"]);
    $profile["numPost"] = $dbh->getNumberPost($profile["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
