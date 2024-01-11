<?php
require_once("bootstrap.php");

$templateParams["title"] = "Revly - Login";
$templateParams["top-template"] = "logo.php";
$templateParams["main-template"] = "login-form.php";

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["email"]) && $dbh->checkUniqueUserAttribute($_POST["username"], $_POST["email"])) {
    if (isset($_POST["surname"])) {
        $dbh->registerUser($_POST["username"], $_POST["password"], $_POST["name"], $_POST["email"], $_POST["surname"]);
    } else {
        $dbh->registerUser($_POST["username"], $_POST["password"], $_POST["name"], $_POST["email"]);
    }
}

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $loginResult = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if (count($loginResult) != 0) {
        //Login effettuato
        registerLoggedUser($loginResult[0]);
        $templateParams["title"] = "Revly - Home";
        $templateParams["top-template"] = "page-top.php";
        $templateParams["main-template"] = "home-posts.php";
        $_SESSION["back-page"] = __FILE__;

    } else {
        //Errore login
        $templateParams["loginError"] = "Error! Wrong username and/or password";
    }
}

require("template/base.php");
?>