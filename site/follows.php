<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn() && isset($_GET["email"])) {
    $templateParams["title"] = "Revly - " . $_GET["email"] . "'s follows";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "show-line-user.php";
    $templateParams["users"] = $dbh->getFollows($_GET['email']);
    $templateParams["js"] = array("js/back.js");
    
    require("template/base.php");
} else {
    header("Location: index.php");
}
?>