<?php
require_once("bootstrap.php");
session_start();

$templateParams["title"] = "Revly - Search";
$templateParams["top-template"] = "";
$templateParams["main-template"] = "";

require("template/base.php");
?>