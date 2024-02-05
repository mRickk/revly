<?php $user = $templateParams["user"]; ?>
<section class="d-flex flex-column min-vh-100">
    <div class="settings-section flex-grow-1 bg-body-secondary bg-opacity-75 mt-3 p-2">
        <div class="row gx-1">
            <h2>Settings</h2>
        </div>
        <div class="row gx-1 mb-2">
            <h3>Account</h3>
            <a href="change-personal-details.php">
                <div class="row gx-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1"></div>
                        <div class="col-1 me-1">
                            <i class="bi bi-person-gear fs-2"></i>
                        </div>
                        <div class="col-9">
                            <h4 class="m-0">Change personal details</h4>
                        </div>
                        <div class="col-1">
                            <i class="bi bi-caret-right fs-2"></i>  
                        </div>
                    </div>
                </div>
            </a>
            <a href="change-photo-bio.php">
                <div class="row gx-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1"></div>
                        <div class="col-1 me-1">
                            <i class="bi bi-image fs-2"></i>
                        </div>
                        <div class="col-9">
                            <h4 class="m-0">Change photo & bio</h4>
                        </div>
                        <div class="col-1">
                            <i class="bi bi-caret-right fs-2"></i> 
                        </div>
                    </div>
                </div>
            </a>
            <a href="change-password.php">
                <div class="row gx-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1"></div>
                        <div class="col-1 me-1">
                            <i class="bi bi-key fs-2"></i>
                        </div>
                        <div class="col-9">
                            <h4 class="m-0">Change password</h4>
                        </div>
                        <div class="col-1">
                            <i class="bi bi-caret-right fs-2"></i> 
                        </div>
                    </div>
                </div>
            </a>
            <a href="index.php">
                <div class="row gx-2">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <p class="text-danger m-1">Logout from this account</p>
                    </div>
                </div>
            </a>
            <a href="index.php">
                <div class="row gx-2">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <p class="text-danger m-1">Delete this account</p><?php //TODO: implementare delete ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="row gx-1 mb-2">
            <h3>Notifications</h3>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <i class="bi bi-chat-left-heart fs-2"></i>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Likes</h4>
                    </div>
                    <div class="col-2">
                    <?php if ($user["notifyLikes"]):?>
                        <i class="bi bi-toggle-on fs-1 revly-primary-color"></i>
                    <?php else:?>
                        <i class="bi bi-toggle-off fs-1 text-secondary"></i>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <i class="bi bi-chat-square-text fs-2"></i>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Comments</h4>
                    </div>
                    <div class="col-2">
                    <?php if ($user["notifyComments"]):?>
                        <i class="bi bi-toggle-on fs-1 revly-primary-color"></i>
                    <?php else:?>
                        <i class="bi bi-toggle-off fs-1 text-secondary"></i>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <i class="bi bi-tag fs-2"></i>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Tags</h4>
                    </div>
                    <div class="col-2">
                    <?php if ($user["notifyTags"]):?>
                        <i class="bi bi-toggle-on fs-1 revly-primary-color"></i>
                    <?php else:?>
                        <i class="bi bi-toggle-off fs-1 text-secondary"></i>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <i class="bi bi-person-add fs-2"></i>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Follows</h4>
                    </div>
                    <div class="col-2">
                    <?php if ($user["notifyFollows"]):?>
                        <i class="bi bi-toggle-on fs-1 revly-primary-color"></i>
                    <?php else:?>
                        <i class="bi bi-toggle-off fs-1 text-secondary"></i>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="settings">
    <div class="account-settings">
        
        <div class="photo-bio">
        <a href="">
            
            <p></p>
            
        </a>
        </div>
        <div class="password">
            <a href="">
                
                <p></p>
                
            </a>
        </div>
        <div class="logout">
            <p></p>
        </div>
    </div>
    <div class="notifications-settings">
        <h2>Notifications</h2>
        <div class="likes">
            
            <p>Likes</p>
            
        </div>
        <div class="comments">
            <i class=""></i>
            <p>Comments</p>
            
        </div>
        <div class="tags">
            <i class=""></i>
            <p>Tags</p>
        </div>
        <div class="follows">
            <p>Follows</p>
        </div>
    </div>
</div>