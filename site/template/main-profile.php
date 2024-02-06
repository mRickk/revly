<div class="row gx-1">
    <div class="col-3">
        <div class="ratio ratio-1x1 text-center">
            <img class="rounded-circle object-fit-fill" src="<?php echo UPLOAD_DIR . $profile['img']; ?>" alt=""/>
        </div>
    </div>
    <div class="col-9">
        <div class="row gx-1">
            <h2>
                <?php echo $profile["username"];
                if ($profile["isCompany"]): ?>
                <span class="bi bi-patch-check-fill fs-5" title="Company Badge"></span>
                <?php endif; ?>
            </h2>
        </div>
        <div class="row gx-1">
            <div class="col-4 text-center">
                <a href="follower.php?email=<?php echo $profile['email']; ?>">
                    <h3 class="fs-6">FOLLOWERS </br> <span id="followerCount"><?php echo $profile["numFollower"]; ?></span></h3>
                </a>
            </div>
            <div class="col-4 text-center">
                <h3 class="fs-6">POSTS </br> <?php echo $profile["numPost"]; ?></h3>
            </div>
            <div class="col-4 text-center">
                <a href="follows.php?email=<?php echo $profile['email']; ?>">
                    <h3 class="fs-6">FOLLOWING </br> <?php echo $profile["numFollowing"]; ?></h3>
                </a>
            </div>
        </div>
        <div class="row gx-1 mb-2">
            <div class="col-1"></div>
            <div class="col-10 text-center">
            <?php if (isset($templateParams["isFollowed"])):?>
                <?php if ($templateParams["isFollowed"]): //TODO: pulsante following con js?>
                    <button type="button" id="followBtn" class="shadow btn btn-secondary w-100 rounded-pill">Following</button>
                <?php else:?>
                    <button type="button" id="followBtn" class="shadow btn btn-primary w-100 rounded-pill">Follow me</button>
                <?php endif;?>
            <?php endif;?>
            <div class="col-1"></div>
        </div>
    </div>
</div>
<div class="bg-body-tertiary bg-opacity-25 mb-5 rounded-3 p-2 shadow-sm">
    <div class="row gx-1">
        <h3 class="m-0">
            <?php echo $profile["name"]; ?>
        </h3>
    </div>
    <div class="row gx-1">
        <p class="m-0">
            <?php echo $profile["biography"]; ?>
        </p>
    </div>
</div>


<?php require_once("show-posts.php");?>