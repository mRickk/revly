<div class="profile-top">
    <p><?php echo $profile["username"]; ?></p>
    <?php if ($profile["isCompany"]): ?>
        <i class="bi bi-patch-check-fill"></i>
    <?php endif; ?>
    <img src="<?php echo UPLOAD_DIR . $profile['img']; ?>" alt="Profile picture of <?php echo $profile['username']?>"/>
    <p>Followers: <?php echo $templateParams["numFollower"]; ?></p>
    <p>Posts: <?php echo $templateParams["numPost"]; ?></p>
    <p>Followings: <?php echo $templateParams["numFollowing"]; //TODO: calcola e aggiorna il num di followers?></p>
    <?php if (isset($templateParams["isFollowed"])):?>
        <?php if ($templateParams["isFollowed"]): //TODO: pulsante following con js?>
            <div class="following-btn">
                <p>Following</p>
            </div>
        <?php else:?>
            <div class="follow-btn">
                <p>Follow</p>
            </div>
        <?php endif;?>
    <?php endif;?>
</div>

<?php require_once("show-posts.php");?>