<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    //$currentPage = 'Home';
    $posts = $dbh->getHomePosts($_SESSION["email"]);
    for ($i = 0; $i < count($posts); $i++){
        $posts[$i]["liked"] = $dbh->isPostLiked($_SESSION["email"], $posts[$i]["id_post"]);   
    }
    unset($p);
    $templateParams["posts"] = $posts;

    $templateParams["title"] = "Revly - Home";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "show-posts.php";
    $templateParams["js"] = ["js/like.js"];

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
