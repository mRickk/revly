<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Change personal details";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "personal-details-form.php";
    $templateParams["js"] = array("js/back.js");

    if (isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["surname"])) {
        $res = $dbh->updatePersonalDetails($_POST["username"], $_POST["name"], $_POST["surname"], $_SESSION["email"]);
        if ($res) {
            $templateParams["success-msg"] = "Your personal details have been updated!";
        } else {
            $templateParams["failure-msg"] = "An error occured: your personal details have NOT been updated.";
        }
    }
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>