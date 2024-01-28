<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Imposta la variabile di sessione
    $_SESSION["profile_email"] = $email;

    // Invia una risposta (puoi personalizzarla a seconda delle tue esigenze)
    echo json_encode(["success" => true, "message" => "Variabile di sessione impostata con successo"]);
} else {
    // Invia una risposta in caso di errore di richiesta
    echo json_encode(["error" => true, "message" => "Richiesta non valida"]);
}

?>
