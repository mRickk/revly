<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && isset($_GET['idPost'])) {
    $post = $dbh->getPost($_GET["idPost"]);
    $_SESSION["id_post"] = $_GET["idPost"];
    if (count($post) == 0) {
        $templateParams["title"] = "Revly - Post not found";
        $templateParams["top-template"] = "focus-top.php";
        $templateParams["main-template"] = "not-found.php";
        $templateParams["not-found"] = "post";
    }
    $post["liked"] = $dbh->isPostLiked($_SESSION["email"], $post["id_post"]);
    $templateParams["post"] = $post;
    $templateParams["comments"] = $dbh->getComments($post["id_post"]);

    $templateParams["title"] = "Revly - " . $post["username"] . "'s post";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "main-post-focus.php";
    $templateParams["js"] = array("js/comment.js", "js/like.js", "js/back.js", "js/delete.js");
    require("template/base.php");
} else {
    header("Location: index.php");
}
?>