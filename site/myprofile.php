<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $profile = $dbh->getUserWithEmail($_SESSION["email"]);
    $templateParams["profile"] = $profile;
    $posts = $dbh->getProfilePosts($profile["email"]);
    for ($i = 0; $i < count($posts); $i++){
        $posts[$i]["liked"] = $dbh->isPostLiked($_SESSION["email"], $posts[$i]["id_post"]);  
    }
    
    $templateParams["posts"] = $posts;

    $templateParams["title"] = "Revly - Your profile";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-profile.php";
    $templateParams["js"] = ["js/like.js","js/delete.js"];
    $templateParams["iconSelected"] = 4;
    
    $profile["numFollowing"] = $dbh->getNumberFollows($profile["email"]);
    $profile["numFollower"] = $dbh->getNumberFollowers($profile["email"]);
    $profile["numPost"] = $dbh->getNumberPost($profile["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
