<!-- single-post.php -->

<div class="post">
    <img src="./img/<?php echo $selectedUser['img']; ?>" alt="Foto Utente" />
    <img src="./img/<?php echo $post['img']; ?>" alt="Foto Post" />
    <p><strong><?php echo $selectedUser['username']; ?></strong></p>
    <p><?php echo $post['description']; ?></p>
    <p><?php echo $post['likes']; ?></p>
    <p><?php echo $post['subject']; ?></p>
</div>
