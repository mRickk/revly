<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Create post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "create-post.php";

    $tag = $dbh->getTaggable();
    $templateParams["tags"] = $tag;

    if(isset($_FILES["imgPost"])){
        list($result, $msg) = uploadImage(UPLOAD_DIR,  $_FILES["imgPost"]);

        if($result == 1) {
            if (isset($_POST["subject"]) && isset($_POST["description"]) && isset($_POST["selectedEvaluation"])) {
                
                if (in_array($_POST["subject"], array_column($tag, 'name'))) {
                    $dbh->newPost($_SESSION["email"], $msg, NULL, $_POST["description"], $_POST["selectedEvaluation"], NULL);
                } else{
                    $dbh->newPost($_SESSION["email"], $msg, $_POST["subject"], $_POST["description"], $_POST["selectedEvaluation"], NULL);
                }
                header("Location: home.php");
                exit(); // Assicurati di terminare lo script qui
            }
        }
    }

    // Se non c'è una richiesta AJAX, includi il template
    if (!isset($_GET['ajax'])) {
        require("template/base.php");
    }
} else {
    header("Location: index.php");
}
?>
