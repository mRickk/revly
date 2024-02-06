<?php
require_once("bootstrap.php");

$templateParams["title"] = "Revly - Sign up";
$templateParams["top-template"] = "logo.php";
$templateParams["main-template"] = "signup-form.php";
sec_session_start();

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["confirm_password"])) {
    if (strcmp($_POST["confirm_password"], $_POST["password"]) != 0) {
        $templateParams["failure-msg"] = "Password and confirmation password must match.";
        $templateParams["username"] = $_POST["username"];
        $templateParams["email"] = $_POST["email"];
    } elseif (count($dbh->getUserWithUsername($_POST["username"])) != 0) {
        $templateParams["failure-msg"] = "Username already taken.";
        $templateParams["email"] = $_POST["email"];
        $templateParams["password"] = $_POST["password"];
    } elseif (count($dbh->getUserWithEmail($_POST["email"])) != 0) {
        $templateParams["failure-msg"] = "Email already taken.";
        $templateParams["username"] = $_POST["username"];
        $templateParams["password"] = $_POST["password"];
    } else {
        if (isset($_POST["surname"])) {
            $dbh->registerUser($_POST["username"], $_POST["password"], $_POST["name"], $_POST["email"], $_POST["surname"]);
        } else {
            $dbh->registerUser($_POST["username"], $_POST["password"], $_POST["name"], $_POST["email"]);
        }
        $templateParams["success-msg"] = "Registration completed successfully!";
        header("Location: index.php");
    }
    $templateParams["name"] = $_POST["name"];
    $templateParams["surname"] = isset($_POST["surname"]) ? $_POST["surname"] : '';
}

require("template/base.php");
?>