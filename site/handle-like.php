<?php
// All'interno di handle-like.php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    // Esegui la logica per verificare e gestire il like nel database
    $liked = $dbh->handleLike($_SESSION["email"], $postId);

    // Invia una risposta JSON al client
    echo json_encode(["liked" => $liked]);
} else {
    // Invia una risposta in caso di errore di richiesta
    echo json_encode(["error" => "Richiesta non valida"]);
}
?>
