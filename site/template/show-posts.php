<!-- show-posts.php -->

<?php

if (isset($templateParams["posts"]) && count($templateParams["posts"]) > 0) {
    foreach ($templateParams["posts"] as $post) {
        // Includi il template per il singolo post
        include 'post.php';
    }
}
?>
