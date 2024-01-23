<div class="notification">
    <?php /*CONTINUA DA QUA*/if ($notification['subject'] != null): ?>
        <p><?php echo $notification['subject']; ?></p>
        <?php else: ?>
        <p><?php echo $notification['tag_name']; ?></p>
        <p><?php echo $notification['company_name']; ?></p>
        <?php if ($notification['tag_address'] != null): ?>
            <p><?php echo $notification['tag_address']; ?></p>
        <?php endif; ?>
    <?php endif; ?>
    <img src="./img/<?php echo $notification['post_img']; ?>" alt="Post picture of <?php echo $notification['username']?>"/>
    <p><?php echo $notification['likes']; ?></p>
    <p><?php echo $notification['description']; ?></p>
</div>
