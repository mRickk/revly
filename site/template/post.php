<!-- single-post.php -->

<div class="post">
    <div class="post-author">
        <img src="<?php echo UPLOAD_DIR . $post['user_img']; ?>" alt="Profile picture of <?php echo $post['username']?>"/>
        <p><strong><?php echo $post['username']; ?></strong></p>
    <?php if (isUserLoggedIn() && strcmp($_SESSION["username"], $post["username"]) == 0): //TODO: aggiungere evento js click del bin ?>
        <i class="bi bi-trash3">Delete</i>
    <?php endif; ?>
    </div>
    <div class="post-body">
    <?php if ($post['subject'] != null): ?>
        <p><?php echo $post['subject']; ?></p>
        <?php else: ?>
        <p><?php echo $post['tag_name']; ?></p>
        <p><?php echo $post['company_name']; ?></p>
        <?php if ($post['tag_address'] != null): ?>
            <p><?php echo $post['tag_address']; ?></p>
        <?php endif; ?>
    <?php endif; ?>
    <img src="<?php echo UPLOAD_DIR . $post['post_img']; ?>" alt="Post picture of <?php echo $post['username']?>"/>
    <p><?php echo $post['likes']; ?></p>
    <p><?php echo $post['description']; ?></p>
    </div>
</div>
