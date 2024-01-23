<!-- show-posts.php -->

<?php

if (isset($templateParams["posts"]) && count($templateParams["posts"]) > 0) {
    foreach ($templateParams["posts"] as $post) {
        // Includi il template per il singolo post
        include 'post.php';
    }
} else {
    echo '<p>Start following users or creating posts to see them here!</p>';
}
?>
