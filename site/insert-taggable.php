<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Add Taggable";
    $templateParams["top-template"] = "subsettings-top.php";
    $templateParams["main-template"] = "taggable-form.php";

    if (isset($_POST["taggable"])) {
        if(isset($_POST["address"])) {
            $res = $dbh->insertTaggable($_POST["taggable"], $_POST["address"], $_SESSION["email"]);
        } else {
            $res = $dbh->insertTaggable($_POST["taggable"], NULL, $_SESSION["email"]);
        }
        if ($res) {
            $templateParams["success-msg"] = "You have successfully added a new taggable!";
        } else {
            $templateParams["failure-msg"] = "An error occured: taggable has not been added.";
        }
    }
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>