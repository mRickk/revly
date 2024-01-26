<?php
require_once("bootstrap.php");

if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];
    $suggestions = getTaggableSuggestions($searchTerm, $dbh);
    echo json_encode($suggestions);
}
?>
