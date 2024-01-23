<?php
require_once("bootstrap.php");
session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Create post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "create-post.php";
    $tag = $dbh->getTaggable();
    $templateParams["tags"] = $tag;

    if (isset($_POST["subject"]) && isset($_POST["description"]) && isset($_POST["file"]) && isset($_POST["selectedEvaluation"])) {
        
        if (in_array($_POST["subject"], array_column($tag, 'name'))) {
            $dbh->newPost($_SESSION["email"], $_POST["file"], NULL, $_POST["description"], $_POST["selectedEvaluation"], NULL);
        } else{
            $dbh->newPost($_SESSION["email"], $_POST["file"], $_POST["subject"], $_POST["description"], $_POST["selectedEvaluation"], NULL);
        }
        /*
        header("Location: home.php");
        */
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_FILES["file"])) {
            $targetDir = "img/";
            $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "No file received.";
        }
    }

    require("template/base.php");
} else {
    header("Location: index.php");
}
?>
