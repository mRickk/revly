<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Add Taggable";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "taggable-form.php";
    $templateParams["js"] = array("js/back.js");

    if (isset($_POST["taggable"])) {
        if(isset($_POST["address"])) {
            $res = $dbh->insertTaggable($_POST["taggable"], $_POST["address"], $_SESSION["email"]);
        } else {
            $res = $dbh->insertTaggable($_POST["taggable"], NULL, $_SESSION["email"]);
        }
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