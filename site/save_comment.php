<?php
require_once("bootstrap.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = isset($_POST['comment']) ? $_POST['comment'] : '';
    $queryResult = $dbh->newComment($data, $_SESSION["id_post"],$_SESSION["email"]);
    $notifyResult = $dbh->addNotify($_SESSION["id_post"],$_SESSION["email"], 3, NULL);

    $queryResult["img"] = UPLOAD_DIR . $queryResult["img"];

    if (!empty($queryResult)) {
         echo json_encode($queryResult);
    } else {
        echo json_encode(["error" => "Nessun utente trovato"]);
    }
}
?>
