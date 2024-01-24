<?php $user = $templateParams["user"]; ?>
<div class="settings">
    <div class="account-settings">
        <h2>Account</h2>
        <div class="personal-details">
            <i class="bi bi-person-fill-gear"></i>
            <p>Change personal details</p>
            <i class="bi bi-caret-right"></i>
        </div>
        <div class="photo-bio">
            <i class="bi bi-image"></i>
            <p>Change photo & bio</p>
            <i class="bi bi-caret-right"></i>
        </div>
        <div class="password">
            <i class="bi bi-key"></i>
            <p>Change password</p>
            <i class="bi bi-caret-right"></i>
        </div>
        <div class="logout">
            <p>Logout from this account</p>
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