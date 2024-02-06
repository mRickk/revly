<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Add Taggable";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "company-request-form.php";
    $templateParams["js"] = array("js/back.js");
    $templateParams["requestCompany"] = $dbh->checkRequestCompany($_SESSION["email"]);
    if (isset($_POST["address"]) && isset($_POST["name"])) {
        $res = $dbh->newRequestCompany($_POST["address"], $_POST["name"], $_SESSION["email"]);
        if ($res) {
            $templateParams["success-msg"] = "Your company account request has been submitted!";
        } else {
            $templateParams["failure-msg"] = "An error occured: your company account request has NOT been submitted.";
        }
    }
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);
    require("template/base.php");
} else {
    header("Location: index.php");
}
?>