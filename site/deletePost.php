<?php
require_once("bootstrap.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idPost"])) {
    $res = $dbh->deletePost($_POST["idPost"]);
    echo json_encode($res);
}
?>
