<?php
require_once("page-top.php");
$profile = $templateParams["profile"];
?>

<div class="profile-top">
    <p><?php echo $profile["username"]; ?></p>
    <img src="./img/<?php echo $profile['img']; ?>" alt="Profile picture of <?php echo $profile['username']?>"/>
    <p>Followers: <?php echo $profile["numFollower"]; ?></p>
    <p>Posts: <?php echo $profile["numPost"]; ?></p>
    <p>Followings: <?php echo $profile["numFollowing"]; ?></p>
</div>