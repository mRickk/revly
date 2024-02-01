<div class="comment bg-dark-subtle bg-opacity-75 mb-3">
   <div class="row gx-1">
        <div class="col-1">
            <img class="rounded-circle" src="<?php echo UPLOAD_DIR . $comment["img"]; ?>" alt="Profile picture of <?php echo $comment["username"]?>"/>
        </div>
        <div class="col-10">
            <a href='profile.php?username=<?php echo $post['username']; ?>'>
                <h2>
                    <?php echo $comment["username"]; 
                    if ($comment["isCompany"]): ?>
                    <i class="bi bi-patch-check-fill"></i>
                    <?php endif; ?>
                </h2>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10">
            <p><?php echo $comment["description"]?></p>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10 text-end">
            <p><?php echo $comment["date_time"]?></p>
        </div>
        <div class="col-1"></div>
    </div>
</div>