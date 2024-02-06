<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn() && isset($_GET['idPost'])) {
    $templateParams["title"] = "Revly - Likes's follower";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "show-line-user.php";
    $templateParams["users"] = $dbh->getListLike($_GET['idPost']);
    $templateParams["js"] = array("js/back.js");
    
    require("template/base.php");
} else {
    header("Location: index.php");
}
?>