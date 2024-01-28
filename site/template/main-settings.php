<?php $user = $templateParams["user"]; ?>
<div class="settings">
    <div class="account-settings">
        <h2>Account</h2>
        <div class="personal-details">
            <a href="change-personal-details.php">
                <i class="bi bi-person-fill-gear"></i>
                <p>Change personal details</p>
                <i class="bi bi-caret-right"></i>
            </a>
        </div>
        <div class="photo-bio">
        <a href="change-photo-bio.php">
            <i class="bi bi-image"></i>
            <p>Change photo & bio</p>
            <i class="bi bi-caret-right"></i>
        </a>
        </div>
        <div class="password">
            <a href="change-password.php">
                <i class="bi bi-key"></i>
                <p>Change password</p>
                <i class="bi bi-caret-right"></i>
            </a>
        </div>
        <div class="logout">
            <p><a href="index.php">Logout from this account</a></p>
        </div>
        <div class="delete">
            <p><a href="index.php">Delete this account</a></p><?php //TODO: implementare delete ?>
        </div>
    </div>
    <div class="notifications-settings">
        <h2>Notifications</h2>
        <div class="likes">
            <i class="bi bi-chat-left-heart"></i>
            <p>Likes</p>
            <?php if ($user["notifyLikes"]):?>
                <i class="bi bi-toggle-on"></i>
            <?php else:?>
                <i class="bi bi-toggle-off"></i>
            <?php endif;?>
        </div>
        <div class="comments">
            <i class="bi bi-chat-square-text"></i>
            <p>Comments</p>
            <?php if ($user["notifyComments"]):?>
                <i class="bi bi-toggle-on"></i>
            <?php else:?>
                <i class="bi bi-toggle-off"></i>
            <?php endif;?>
        </div>
        <div class="tags">
            <i class="bi bi-tag"></i>
            <p>Tags</p>
            <?php if ($user["notifyTags"]):?>
                <i class="bi bi-toggle-on"></i>
            <?php else:?>
                <i class="bi bi-toggle-off"></i>
            <?php endif;?>
        </div>
        <div class="follows">
            <p>Follows</p>
            <?php if ($user["notifyFollows"]):?>
                <i class="bi bi-toggle-on"></i>
            <?php else:?>
                <i class="bi bi-toggle-off"></i>
            <?php endif;?>
        </div>
    </div>
</div>