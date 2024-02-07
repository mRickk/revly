<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    
    $templateParams["title"] = "Revly - Settings";
    $templateParams["top-template"] = "settings-top.php";
    $templateParams["main-template"] = "main-settings.php";
    $templateParams["js"] = array("js/settings.js");
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>