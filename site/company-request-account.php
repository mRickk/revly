<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Add Taggable";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "taggable-form.php";
    $templateParams["js"] = array("js/back.js");

    if (isset($_POST["address"]) && isset($_POST["name"])) {
        $res = $dbh->insertNewCompanyReuest($_POST["address"], $_POST["name"], $_SESSION["email"]);
        if ($res) {
            $templateParams["success-msg"] = "You have successfully added a new taggable!";
        } else {
            $templateParams["failure-msg"] = "An error occured: the new taggable has not been inserted.";
        }
    }
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>