<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    
    $templateParams["title"] = "Revly - Settings";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "main-settings.php";
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>