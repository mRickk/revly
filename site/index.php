<?php
require_once("bootstrap.php");

$templateParams["title"] = "Revly - Login";
$templateParams["top-template"] = "logo.php";
$templateParams["main-template"] = "login-form.php";

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $loginResult = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if (count($loginResult) != 0) {
        //Login effettuato
        registerLoggedUser($loginResult[0]);
        $templateParams["title"] = "Revly - Home";
        $templateParams["top-template"] = "top-nav.php";
        $templateParams["main-template"] = "home-posts.php";
    } else {
        //Errore login
        $templateParams["loginError"] = "Error! Wrong username and/or password";
    }
}

require("template/base.php");
?>