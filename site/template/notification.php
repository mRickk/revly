<div class="notification">
    <p><?php echo str_replace("USER", $notification["notifier_username"], $notification["message"]); ?></p>
    <?php if ($notification["id_post"] != null): //TODO: gestire con js il click dell'immagine e il redirect ?>
        <a href="post-focus.php"><img src="./img/<?php echo $notification['post_img']; ?>" alt=""/></a>
    <?php else: ?>
        <a href="profile.php"><img src="./img/<?php echo $notification['notifier_img']; ?>" alt=""/></a>
    <?php endif; ?> 
    <p><?php echo substr($notification["date_time"], 0, -3); ?></p>
</div>