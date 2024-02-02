<?php
require("bootstrap.php");
session_start();

$templateParams["title"] = "Search";
$templateParams["top-template"] = "focus-top.php";
$templateParams["main-template"] = "search-form.php";
$templateParams["js"] = ["js/search.js"];
    
require("template/base.php");
?>