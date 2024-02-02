<section class="d-flex flex-column min-vh-100">
    <div class="recent-searches flex-grow-1 bg-body-tertiary bg-opacity-25 mt-3 p-2">
        <div class="row gx-1">
            <h2>Users</h2>
        </div>
        <div id="searchResult">
            <?php foreach ($templateParams["users"] as $user): ?>
                <a href="#" class="d-inline-block user-link" data-email="<?php echo $user['email']; ?>">
                    <div class="row gx-2">                
                        <div class="col-1">
                            <img class="rounded-circle" src="<?php echo $user['img']; ?>" alt="Profile picture of <?php echo $user['username']; ?>"/>
                        </div>
                        <div class="col-9">
                            <p>
                                <?php echo $user['username']; ?>
                                <?php echo $user['isCompany'] ? '<i class="bi bi-patch-check-fill fs-5"></i>' : ''; ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>