<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    //$currentPage = 'Home';
    $templateParams["posts"] = array();
    $postsResult = $dbh->getHomePosts($_SESSION["email"]);
    $templateParams["posts"] = $postsResult;

    $templateParams["title"] = "Revly - Home";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "show-posts.php";

    $_SESSION["profile_email"]="enoteca.galli@email.com"; //TODO:  ELIMINA !!!

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
