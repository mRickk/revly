<!-- home-posts.php -->

<?php
$selectedUser = null;

if ($templateParams["post"]->num_rows > 0) {
    echo "1";
    foreach ($templateParams["post"] as $post) {
        echo "2";
        foreach ($templateParams["users"] as $user) {
            if ($user["email"] == $post["author_email"]) {
                $selectedUser = $user;
                break; // Esci dal ciclo una volta trovato l'utente desiderato
            }
        }
        // Includi il template per il singolo post
        include 'post.php';
    }
} else {
    echo '<p>Nessun post trovato per l\'utente.</p>';
}
?>
