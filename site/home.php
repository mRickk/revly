<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    //$currentPage = 'Home';
    $posts = $dbh->getHomePosts($_SESSION["email"]);
    foreach ($posts as &$p) {
        $p["liked"] = $dbh->isPostLiked($_SESSION["email"], $p["id_post"]);
    }
    unset($p);
    $templateParams["posts"] = $posts;

    $templateParams["title"] = "Revly - Home";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "show-posts.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
