<?php
require_once("bootstrap.php");

// Verifica se è impostato il parametro 'q' (query)
if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];

    // Esegui la query per ottenere i suggerimenti dal database
    $tag = $dbh->getTaggable();
    $suggestions = array_filter($tag, function ($tagItem) use ($searchTerm) {
        return stripos($tagItem['name'], $searchTerm) !== false || stripos($tagItem['company_name'], $searchTerm) !== false;
    });

    // Restituisci i risultati come JSON
    header('Content-Type: application/json');
    echo json_encode($suggestions);
}
?>
