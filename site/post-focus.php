<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn() && isset($_GET['idPost'])) {
    $post = $dbh->getPost($_GET["idPost"]);
    $_SESSION["id_post"] = $_GET["idPost"];
    if (count($post) == 0) {
        $templateParams["title"] = "Revly - Post not found";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "not-found.php";
        $templateParams["not-found"] = "post";
    }
    $post["liked"] = $dbh->isPostLiked($_SESSION["email"], $post["id_post"]);
    $templateParams["post"] = $post;
    $templateParams["comments"] = $dbh->getComments($post["id_post"]);

    $templateParams["title"] = "Revly - " . $post["username"] . "'s post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-post-focus.php";
    $templateParams["js"] = ["js/comment.js"];

    if (isset($_POST["comment"]) && $_POST["comment"] != '') {
        $dbh->newComment($_POST["comment"], $post["id_post"], $_SESSION["email"]);
    }

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>