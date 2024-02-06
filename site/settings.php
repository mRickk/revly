<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    
    $templateParams["title"] = "Revly - Settings";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "main-settings.php";
    $templateParams["js"] = array("js/back.js","js/settings.js", "js/company-request.js");
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>