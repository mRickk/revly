<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = isset($_POST['q']) ? $_POST['q'] : '';
    $queryResult = $dbh->getUsers($data);
    echo json_encode($queryResult);
}
?>
