<?php
require("bootstrap.php");
session_start();

$templateParams["title"] = "Search";
$templateParams["top-template"] = "page-top.php";
$templateParams["main-template"] = "search-form.php";
    
require("template/base.php");
?>