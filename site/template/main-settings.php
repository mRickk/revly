<?php $user = $templateParams["user"]; ?>
<section class="d-flex flex-column min-vh-100">
    <div class="settings-section flex-grow-1 bg-body-secondary bg-opacity-75 p-2 shadow">
        <div class="row gx-1">
            <h2 class="text-secondary">Settings</h2>
        </div>
        <div class="row gx-1 mb-2 ps-1">
            <h3 class="text-secondary roboto-light fs-4 mb-0 mt-2">Account</h3>
            <a href="change-personal-details.php" class="p-2">
                <div class="row gx-2 shadow-sm rounded-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <span class="bi bi-person-gear fs-2"></span>
                        </div>
                        <div class="col-10">
                            <h4 class="m-0">Change personal details</h4>
                        </div>
                        <div class="col-1">
                            <span class="bi bi-caret-right fs-2"></span>  
                        </div>
                    </div>
                </div>
            </a>
            <a href="change-photo-bio.php" class="p-2">
                <div class="row gx-2 shadow-sm rounded-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <span class="bi bi-image fs-2"></span>
                        </div>
                        <div class="col-10">
                            <h4 class="m-0">Change photo & bio</h4>
                        </div>
                        <div class="col-1">
                            <span class="bi bi-caret-right fs-2" ></span> 
                        </div>
                    </div>
                </div>
            </a>
            <a href="change-password.php" class="p-2">
                <div class="row gx-2 shadow-sm rounded-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <span class="bi bi-key fs-2"></span>
                        </div>
                        <div class="col-10">
                            <h4 class="m-0">Change password</h4>
                        </div>
                        <div class="col-1">
                            <span class="bi bi-caret-right fs-2"></span> 
                        </div>
                    </div>
                </div>
            </a>
            <?php if (!$user["isCompany"]):?>
                <a href="company-request-account.php" class="p-2">
                    <div class="row gx-2 shadow-sm rounded-2">
                        <div class="d-flex align-items-center">
                            <div class="col-1 me-1">
                            <span class="bi bi-patch-check fs-2"></span>
                            </div>
                            <div class="col-10">
                                <h4 class="m-0">Request for a company profile</h4>
                            </div>
                            <div class="col-1">
                                <span class="bi bi-caret-right fs-2"></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endif;?>
            <?php if ($user["isCompany"]):?>
                <a href="insert-taggable.php" class="p-2">
                <div class="row gx-2 shadow-sm rounded-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <span class="bi bi-bookmark-plus fs-2"></span>
                        </div>
                        <div class="col-10">
                            <h4 class="m-0">Add new taggable</h4>
                        </div>
                        <div class="col-1">
                            <span class="bi bi-caret-right fs-2"></span> 
                        </div>
                    </div>
                </div>
            </a>
            <?php endif;?>
            <div class="text-danger">
                <a href="logout.php">
                    <div class="row gx-2 ps-3">
                        <h4 class="m-1 roboto-bold fs-5">Logout from this account</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="row gx-1 mb-2 ps-1">
            <h3 class="text-secondary roboto-light fs-4 mb-0 mt-2">Notifications</h3>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <span class="bi bi-chat-left-heart fs-2"></span>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Likes</h4>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-link toggleLike" type="button" aria-pressed="<?php echo ($user["notifyLikes"]) ? 'true' : 'false'; ?>" aria-label="Toggle Likes Notifications">
                            <?php if ($user["notifyLikes"]):?>
                                <span class="bi bi-toggle-on fs-1 revly-primary-color"></span>
                            <?php else:?>
                                <span class="bi bi-toggle-off fs-1 text-secondary"></span>
                            <?php endif;?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <span class="bi bi-chat-square-text fs-2"></span>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Comments</h4>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-link toggleComments" type="button" aria-pressed="<?php echo ($user["notifyComments"]) ? 'true' : 'false'; ?>" aria-label="Toggle Comments Notifications">
                            <?php if ($user["notifyComments"]):?>
                                <span class="bi bi-toggle-on fs-1 revly-primary-color" ></span>
                            <?php else:?>
                                <span class="bi bi-toggle-off fs-1 text-secondary" ></span>
                            <?php endif;?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row gx-2 <?php echo ($user['isCompany']) ? '' : 'visually-hidden'; ?>">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <span class="bi bi-tag fs-2"></span>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Tags</h4>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-link toggleTags" type="button" aria-pressed="<?php echo ($user["notifyTags"]) ? 'true' : 'false'; ?>" aria-label="Toggle Tags Notifications">
                            <?php if ($user["notifyTags"]):?>
                                <span class="bi bi-toggle-on fs-1 revly-primary-color" ></span>
                            <?php else:?>
                                <span class="bi bi-toggle-off fs-1 text-secondary"></span>
                            <?php endif;?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row gx-2">
                <div class="d-flex align-items-center">
                    <div class="col-1"></div>
                    <div class="col-1 me-1">
                        <span class="bi bi-person-add fs-2"></span>
                    </div>
                    <div class="col-8">
                        <h4 class="m-0">Follows</h4>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-link toggleFollows" type="button" aria-pressed="<?php echo ($user["notifyFollows"]) ? 'true' : 'false'; ?>" aria-label="Toggle Follow Notifications">
                            <?php if ($user["notifyFollows"]):?>
                                <span class="bi bi-toggle-on fs-1 revly-primary-color" ></span>
                            <?php else:?>
                                <span class="bi bi-toggle-off fs-1 text-secondary"></span>
                            <?php endif;?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>