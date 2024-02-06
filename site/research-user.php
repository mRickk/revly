<?php
require("bootstrap.php");
sec_session_start();

if(isUserLoggedIn()){
    $templateParams["title"] = "Search";
    $templateParams["top-template"] = "focus-top.php";
    $templateParams["main-template"] = "search-form.php";
    $templateParams["js"] = ["js/search.js", "js/back.js"];
}
require("template/base.php");
?>