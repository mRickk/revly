<div class="row gx-1">
    <div class="col-3">
        <img class="rounded-circle" src="<?php echo UPLOAD_DIR . $profile['img']; ?>" alt="Profile picture of <?php echo $profile['username']?>"/>
    </div>
    <div class="col-9">
        <div class="row gx-1">
            <h2>
                <?php echo $profile["username"];
                if ($profile["isCompany"]): ?>
                <i class="bi bi-patch-check-fill"></i>
                <?php endif; ?>
            </h2>
        </div>
        <div class="row gx-1">
        <div class="col-4 text-center">
            <h3 class="fs-6">FOLLOWERS </br> <span id="followerCount"><?php echo $profile["numFollower"]; ?></span></h3>
        </div>
            <div class="col-4 text-center">
                <h3 class="fs-6">POSTS </br> <?php echo $profile["numPost"]; ?></h3>
            </div>
            <div class="col-4 text-center">
                <h3 class="fs-6">FOLLOWING </br> <?php echo $profile["numFollowing"]; ?></h3>
            </div>
        </div>
        <div class="row gx-1 mb-5">
            <div class="col-1"></div>
            <div class="col-10 text-center">
            <?php if (isset($templateParams["isFollowed"])):?>
                <?php if ($templateParams["isFollowed"]): //TODO: pulsante following con js?>
                    <button type="button" id="followBtn" class="btn btn-outline-dark w-100 rounded-pill">Following</button>
                <?php else:?>
                    <button type="button" id="followBtn" class="btn btn-primary w-100 rounded-pill">Follow me</button>
                <?php endif;?>
            <?php endif;?>
            <div class="col-1"></div>
        </div>
    </div>
</div>

<?php require_once("show-posts.php");?>