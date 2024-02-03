<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    
    $templateParams["title"] = "Revly - Settings";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "main-settings.php";
    $templateParams["js"] = array("js/settings.js");
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>