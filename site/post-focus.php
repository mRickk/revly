<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_post"])) {
    $post = $dbh->getPost($_POST["id_post"]);
    if (count($post) == 0) {
        $templateParams["title"] = "Revly - No post found";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "no-user-found.php";
        $templateParams["not-found"] = "post";
    }
    $post["liked"] = $dbh->isPostLiked($_SESSION["email"], $post["id_post"]);
    $templateParams["post"] = $post;
    $templateParams["comments"] = $dbh->getComments($post["id_post"]);

    $templateParams["title"] = "Revly - " . $post["username"] . "'s post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-post-focus.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>