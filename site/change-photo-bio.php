<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Change password";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "photo-bio-form.php";
    $templateParams["js"] = array("js/back.js", "js/change-photo.js");

    $userInfo = $dbh->getUserWithEmail($_SESSION["email"]);

    if ($userInfo) {
        $templateParams["user"] = $userInfo;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $msg = $userInfo["img"];

            if (isset($_FILES["imgPost"]) && $_FILES["imgPost"]["size"] > 0) {
                list($result, $newMsg) = uploadImage(UPLOAD_DIR, $_FILES["imgPost"]);

                if ($result == 1) {
                    $msg = $newMsg;
                }
               
            } elseif (isset($_POST["removePhoto"]) && $_POST["removePhoto"] === "true") {
                unlink(UPLOAD_DIR . $userInfo["img"]);
                $msg = "default-image.png";
            }

            $res = $dbh->updatePhoto($msg, $_POST["bio"], $_SESSION["email"]);

            if ($res) {
                $templateParams["success-msg"] = "Your photo & bio have been updated!";
                header("Location: settings.php");
            } else {
                $templateParams["failure-msg"] = "An error occurred: your photo & bio have NOT been updated.";
            }
        }
    }

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
