<section class="d-flex flex-column min-vh-100">
    <div class="show-users flex-grow-1 bg-body-tertiary bg-opacity-25 mt-3 p-2 shadow">
        <div class="row gx-1">
            <h2 class="text-secondary">Users</h2>
        </div>
        <div class="ps-1">
        <?php foreach ($templateParams["users"] as $user): ?>
            <a href="profile.php?username=<?php echo $user['username']; ?>">
                <div class="row gx-2 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <div class="ratio ratio-1x1 text-center">
                                <img class="rounded-circle object-fit-cover" src="<?php echo $user['img']; ?>" alt=""/>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="m-0 fs-5 ps-1">
                                <?php echo $user['username']; ?>
                                <?php echo $user['isCompany'] ? '<span class="bi bi-patch-check-fill fs-5" title="Company Badge" title="Company Badge"></span>' : ''; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
</section>