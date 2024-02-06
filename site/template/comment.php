<div class="comment bg-body-secondary bg-opacity-75 mb-2 shadow-sm">
   <div class="row gx-1">
        <div class="col-1">
            <div class="ratio ratio-1x1 text-center">
                <img class="rounded-circle object-fit-fill" src="<?php echo UPLOAD_DIR . $comment["img"]; ?>" alt=""/>
            </div>
        </div>
        <div class="col-10">
            <a href='profile.php?username=<?php echo $comment['username']; ?>'>
                <h2>
                    <?php echo $comment["username"]; 
                    if ($comment["isCompany"]): ?>
                    <i class="bi bi-patch-check-fill fs-5"></i>
                    <?php endif; ?>
                </h2>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10">
            <p class="text-break"><?php echo $comment["description"];?></p>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10 text-end">
            <p class="text-break"><?php echo substr($comment["date_time"], 0, -3);?></p>
        </div>
        <div class="col-1"></div>
    </div>
</div>