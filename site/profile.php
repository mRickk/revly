<?php
require_once("bootstrap.php");
session_start();


if (isUserLoggedIn() && isset($_GET['username'])) {
    $profile_data = $dbh->getEmailByUsername($_GET['username']);
    
    if (array_key_exists('email', $profile_data)) {
        $profile_email = $profile_data['email'];
    
        // Verifica se l'email ottenuta è uguale all'email dell'utente autenticato
        if (strcmp($profile_email, $_SESSION["email"]) == 0) {
            header("Location: myprofile.php");
        }
        
        $profile = $dbh->getUserWithEmail($profile_email);
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
        $profile["numFollowing"] = $dbh->getNumberFollows($profile["email"]);
        $profile["numFollower"] = $dbh->getNumberFollowers($profile["email"]);
        $profile["numPost"] = $dbh->getNumberPost($profile["email"]);
        
        $templateParams["title"] = "Revly - " . $profile["username"] . "'s profile";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "main-profile.php";

        require("template/base.php");
    } else {
        header("Location: research-user.php");
    }
    
} else {
    header("Location: index.php");
}
?>
