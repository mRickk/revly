<?php
require_once("bootstrap.php");
sec_session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["toggle"])) {
    $res = $dbh->updateToggle($_POST["toggle"], $_SESSION["email"]);
    echo json_encode($res);
}
?>
