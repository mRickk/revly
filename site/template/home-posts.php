<!-- home-posts.php -->

<?php
$selectedUser = null;

if (isset($templateParams["posts"]) && count($templateParams["posts"]) > 0) {
    foreach ($templateParams["posts"] as $post) {
        // Includi il template per il singolo post
        include 'post.php';
    }
} else {
    echo '<p>Nessun post trovato per l\'utente.</p>';
}
?>
