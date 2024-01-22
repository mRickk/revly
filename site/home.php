<?php
require_once("bootstrap.php");
session_start();

$currentPage = 'Home';
$templateParams["post"] = array();
$templateParams["users"] = array();
$postsResult = $dbh->post($_SESSION["username"]);
$templateParams["post"] = $postsResult;

if ($postsResult->num_rows > 0) {
    while ($post = $postsResult->fetch_assoc()) {
        $userInfo = $dbh->getUser($post["author_email"]);
        $user = $userInfo->fetch_assoc();
        $templateParams["users"][] = $user;
    }
}

$templateParams["title"] = "Home";
$templateParams["top-template"] = "page-top.php";
$templateParams["main-template"] = "home-posts.php";

require("template/base.php");
?>
