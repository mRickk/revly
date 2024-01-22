<!-- single-post.php -->

<div class="post">
    <img src="./img/<?php echo $post['user_img']; ?>" alt="Profile photo of <?php echo $post['username']?>"/>
    <img src="./img/<?php echo $post['post_img']; ?>" alt="Post photo" />
    <p><strong><?php echo $post['username']; ?></strong></p>
    <p><?php echo $post['description']; ?></p>
    <p><?php echo $post['likes']; ?></p>
    <p><?php echo $post['subject']; ?></p>
</div>
