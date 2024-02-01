<article class="bg-body-secondary bg-opacity-75 mb-3">
    <div class="row gx-1">
        <div class="col-1">
            <img class="rounded-circle" src="<?php echo UPLOAD_DIR . $notification["notifier_img"]; ?>" alt="Profile picture of <?php echo $notification["notifier_username"]?>"/>
        </div>
        <div class="col-11">
            <a href='profile.php?username=<?php echo $notification["notifier_username"]; ?>'>
                <h2>
                    <?php echo $notification["notifier_username"]; 
                    if ($notification["isCompany"]): ?>
                    <i class="bi bi-patch-check-fill"></i>
                    <?php endif; ?>
                </h2>
            </a>
        </div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-7">
            <p class="text-break"><?php echo str_replace("USER", $notification["notifier_username"], $notification["message"]); ?></p>
        </div>
        <div class="col-3">            
        <?php if ($notification["id_post"] != null): //TODO: gestire con js il click dell'immagine post e il redirect ?>
            <a href="post-focus.php">
                <div class="ratio ratio-1x1">
                    <img class="rounded object-fit-cover" src="<?php echo UPLOAD_DIR . $notification["post_img"]; ?>" alt=""/>
                </div>
            </a>
        <?php endif;?>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10 text-end">
            <p class="text-break"><?php echo substr($notification['date_time'], 0, -3); ?></p>
        </div>
        <div class="col-1"></div>
    </div>
</article>