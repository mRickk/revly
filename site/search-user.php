<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = isset($_POST['q']) ? $_POST['q'] : '';
    $queryResult = $dbh->getUsers($data);

    // Verifica se ci sono risultati
    if (!empty($queryResult)) {
        echo json_encode($queryResult);
    } else {
        echo json_encode(["error" => "Nessun utente trovato"]);
    }
}
?>
