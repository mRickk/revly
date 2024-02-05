<?php
require_once("bootstrap.php");

if (isset($_GET['q']) && $_SERVER["REQUEST_METHOD"] === "GET" ) {
    $searchTerm = $_GET['q'];
    $suggestions = getTaggableSuggestions($searchTerm, $dbh);
    echo json_encode($suggestions);
}
?>
