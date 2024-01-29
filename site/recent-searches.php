<?php
require_once("bootstrap.php");
session_start();

$recentSearches = $dbh->getRecentSearches($_SESSION["email"]);
if (is_array($recentSearches) && !empty($recentSearches)) {
    echo json_encode($recentSearches);
} else {
    echo json_encode([]);
}
?>
