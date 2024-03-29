<?php
require_once("bootstrap.php");

$templateParams["title"] = "Revly - Login";
$templateParams["top-template"] = "logo.php";
$templateParams["main-template"] = "login-form.php";
sec_session_start();

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $loginResult = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if (count($loginResult) != 0) {
        registerLoggedUser($loginResult);
        header("Location: home.php");
        $templateParams["success-msg"] = "Welcome back, " . $_POST["username"];
    } else {
        $templateParams["failure-msg"] = "Login failed! Wrong username and/or password";
    }
}

require("template/base.php");
?>