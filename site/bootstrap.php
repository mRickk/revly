<?php 
require_once("../db/database.php");
require_once("./utils/functions.php");
$server = "localhost";
$username = "root";
$pwd = "";
$dbname = "revly_db";
$port = 3306;

$dbh = new DatabaseHelper($server, $username, $pwd, $dbname, $port);
define("UPLOAD_DIR", "./upload/");

/*
if (!isset($_SESSION['referer'])) {
    $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
}*/

?>