<?php
require_once("bootstrap.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $follow = $dbh->newRequestCompany($_SESSION["email"]);
}
?>
