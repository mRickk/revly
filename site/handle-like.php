<?php
require_once("bootstrap.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    $liked = $dbh->handleLike($_SESSION["email"], $postId);
    $numLike = $dbh->getNumberLike($postId);
    echo json_encode(["liked" => $liked, "numLike" => $numLike]);

} else {
    echo json_encode(["error" => "Richiesta non valida"]);
}
?>
