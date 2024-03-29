<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Change password";
    $templateParams["top-template"] = "subsettings-top.php";
    $templateParams["main-template"] = "password-form.php";

    if (isset($_POST["oldpassword"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"])) {
        if (strcmp($_POST["password"], $_POST["confirmpassword"]) != 0) {
            $templateParams["failure-msg"] = "Your new password and confirmation password must match.";
        }
        elseif (strcmp($_POST["password"], $_POST["oldpassword"]) == 0) {
            $templateParams["failure-msg"] = "Your new password must differ from your old password";
        }
        elseif (count($dbh->checkLogin($_SESSION["username"], $_POST["oldpassword"])) == 0) {
            $templateParams["failure-msg"] = "Wrong old password!";
        } else {
            $res = $dbh->updatePassword($_SESSION["username"], $_SESSION["email"], $_POST["oldpassword"], $_POST["password"], );
            if ($res) {
                $templateParams["success-msg"] = "Your password has been updated!";
            } else {
                $templateParams["failure-msg"] = "An error occured: your password has NOT been updated.";
            }
        }
    }
    $templateParams["user"] = $dbh->getUserWithEmail($_SESSION["email"]);

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>