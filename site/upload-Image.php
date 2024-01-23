<?php
require_once("bootstrap.php");
session_start();

list($result, $msg) = uploadImage(UPLOAD_DIR,  $_FILES["imgPost"]);

if($result == 1) {
    if (isset($_POST["subject"]) && isset($_POST["description"]) && isset($_POST["selectedEvaluation"])) {
        $tag = $dbh->getTaggable();
        $templateParams["tags"] = $tag;
        
        if (in_array($_POST["subject"], array_column($tag, 'name'))) {
            $dbh->newPost($_SESSION["email"], $msg, NULL, $_POST["description"], $_POST["selectedEvaluation"], NULL);
        } else{
            $dbh->newPost($_SESSION["email"], $msg, $_POST["subject"], $_POST["description"], $_POST["selectedEvaluation"], NULL);
        }
        /*
        header("Location: home.php");
        */
    }
}

header("Lacation: create-post.php");
?>
