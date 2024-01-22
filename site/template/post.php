<!-- single-post.php -->

<div class="post">
    <div class="post-author">
        <img src="./img/<?php echo $post['user_img']; ?>" alt="Profile picture of <?php echo $post['username']?>"/>
        <p><strong><?php echo $post['username']; ?></strong></p>
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
    <img src="./img/<?php echo $post['post_img']; ?>" alt="Post picture of <?php echo $post['username']?>"/>
    <p><?php echo $post['likes']; ?></p>
    <p><?php echo $post['description']; ?></p>
    </div>
</div>
