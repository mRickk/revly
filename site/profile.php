<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && isset($_GET['username'])) {
    $email = $dbh->getEmailByUsername($_GET['username']);
    
    if (isset($email)) {
        // Verifica se l'email ottenuta è uguale all'email dell'utente autenticato
        if (strcmp($email, $_SESSION["email"]) == 0) {
            header("Location: myprofile.php");
        }
        
        $profile = $dbh->getUserWithEmail($email);
        if (count($profile) == 0) {
            $templateParams["title"] = "Revly - User not found";
            $templateParams["top-template"] = "page-top.php";
            $templateParams["main-template"] = "not-found.php";
            $templateParams["not-found"] = "user";
        }
        $templateParams["profile"] = $profile;
        $posts = $dbh->getProfilePosts($profile["email"]);
        for ($i = 0; $i < count($posts); $i++){
            $posts[$i]["liked"] = $dbh->isPostLiked($_SESSION["email"], $posts[$i]["id_post"]);  
        }
        $templateParams["posts"] = $posts;
        $profile["numFollowing"] = $dbh->getNumberFollows($profile["email"]);
        $profile["numFollower"] = $dbh->getNumberFollowers($profile["email"]);
        $profile["numPost"] = $dbh->getNumberPost($profile["email"]);
        
        $templateParams["title"] = "Revly - " . $profile["username"] . "'s profile";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "main-profile.php";
        $templateParams["js"] = ["js/like.js"];

        require("template/base.php");
    } else {
        header("Location: research-user.php");
    }
    
} else {
    header("Location: index.php");
}
?>
