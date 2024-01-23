<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Create post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "create-post.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
