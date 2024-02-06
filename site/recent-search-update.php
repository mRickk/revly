<?php
require_once("bootstrap.php");
sec_session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['username'])) {
        $email = $dbh->getEmailByUsername($_POST['username']);
        $queryResult = $dbh->updateRecentSearches($_SESSION["email"], $email);
        echo "success";
    }
}
