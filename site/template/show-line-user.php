<section class="d-flex flex-column min-vh-100">
    <div class="show-users flex-grow-1 bg-body-tertiary bg-opacity-25 mt-3 p-2 shadow">
        <div class="row gx-1">
            <h2>Users</h2>
        </div>
        <?php foreach ($templateParams["users"] as $user): ?>
            <a href="profile.php?username=<?php echo $user['username']; ?>">
                <div class="row gx-2 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="col-1 me-1">
                            <div class="ratio ratio-1x1 text-center">
                                <img class="rounded-circle object-fit-fill" src="<?php echo $user['img']; ?>"/>
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="m-0">
                                <?php echo $user['username']; ?>
                                <?php echo $user['isCompany'] ? '<span class="bi bi-patch-check-fill fs-5"></span>' : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>