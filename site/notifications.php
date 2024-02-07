<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["email"]);

    $templateParams["title"] = "Revly - Notifications";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "notifications-template.php";
    $templateParams["iconSelected"] = 2;

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
