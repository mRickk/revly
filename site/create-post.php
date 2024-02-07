<?php
require_once("bootstrap.php");
sec_session_start();

if (isUserLoggedIn()) {
    $templateParams["title"] = "Revly - Create post";
    $templateParams["top-template"] = "page-top.php";
    $templateParams["main-template"] = "create-post-form.php";
    $templateParams["js"] = array("js/newPost.js", "js/change-photo.js");

    $tag = $dbh->getTaggable();
    $templateParams["tags"] = $tag;

    if(isset($_FILES["imgPost"])){
        list($result, $msg) = uploadImage(UPLOAD_DIR,  $_FILES["imgPost"]);

        if($result == 1) {
            if (isset($_POST["subjectInput"]) && isset($_POST["description"]) && isset($_POST["selectedEvaluation"])) {
                
                $subject = $_POST["subjectInput"];
    
                $combinedNames = array_map(function ($tag) {
                    return $tag['name'] . ' - ' . $tag['company_name'];
                }, $tag);

                $key = array_search($subject, $combinedNames);
                if ($key !== false) {
                    echo "". $key ."". $subject ."";
                    $tagId = $tag[$key]['id'];
                    $dbh->newPost($_SESSION["email"], $msg, NULL, $_POST["description"], $_POST["selectedEvaluation"], $tagId);
                } else {
                    $dbh->newPost($_SESSION["email"], $msg, $subject, $_POST["description"], $_POST["selectedEvaluation"], NULL);
                }
                header("Location: home.php");
            }
        }
    }

    if (!isset($_GET['ajax']) || empty($_GET['q'])) {
        require("template/base.php");
    }
} else {
    header("Location: index.php");
}
?>
