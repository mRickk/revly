<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["email"]);

    $templateParams["title"] = "Revly - Notifications";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "notifications-template.php";

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
