<!-- single-post.php -->
<article class="bg-dark-subtle bg-opacity-50 mb-3">
    <div class="row gx-1">
        <div class="col-1">
            <img class="rounded-circle" src="<?php echo UPLOAD_DIR . $post['user_img']; ?>" alt="Profile picture of <?php echo $post['username']?>"/>
        </div>
        <div class="col-10">
            <a href='profile.php?username=<?php echo $post['username']; ?>'>
                <h2>
                    <?php echo $post['username']; 
                    if ($post["isCompany"]): ?>
                    <i class="bi bi-patch-check-fill"></i>
                    <?php endif; ?>
                </h2>
            </a>
        </div>
        <div class="col-1 p-1">
            <?php if (isUserLoggedIn() && strcmp($_SESSION["username"], $post["username"]) == 0): //TODO: aggiungere evento js click del bin ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                </svg>
            <?php endif; ?>
        </div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10">
            <?php if ($post['subject'] != null): ?>
                <h3><?php echo $post['subject']; ?></h3>
                <?php else: ?>
                <h3><?php echo $post['tag_name']; ?> - <?php echo $post['company_name']; ?></h3>
            <?php endif; ?>
            <div class="col-1"></div>
        </div>
    </div>
    <?php if ($post['tag_address'] != null): ?>
        <div class="row gx-1">
            <div class="col-1"></div>
            <div class="col-10">
                <h4><?php echo $post['tag_address']; ?></h4>
            </div>
            <div class="col-1"></div>
        </div>
    <?php endif; ?>
    <div class="row gx-1 mb-1">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="ratio ratio-1x1">
                <img class="rounded object-fit-contain" src="<?php echo UPLOAD_DIR . $post['post_img']; ?>" alt="Post picture of <?php echo $post['username']?>"/>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-2">
        <div class="col-1"></div>
        <?php for ($i = 0; $i < $post["evaluation"]; $i++): ?>
            <div class="col-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </div>
        <?php endfor; ?>
        <?php for (; $i < 5; $i++): ?>
            <div class="col-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                </svg>
            </div>
        <?php endfor; ?>
        <div class="col-3"></div>
        <div class="col-1">
            <div class="like-icon" data-post-id="<?php echo $post['id_post']; ?>">
            <?php if ($post['liked']): //TODO: aggiungere evento js click del like ?>
                <i class="bi bi-heart-fill fs-2"></i>
                </svg>
            <?php else: ?>
                <i class="bi bi-heart fs-2"></i>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-1">
            <a href='post-focus.php?idPost=<?php echo $post['id_post']; ?>'>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                </svg>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10">
            <p>Likes: <?php echo $post['likes']; ?></p>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1 my-2">
        <div class="col-1"></div>
        <div class="col-10">
            <p class="text-break"><?php echo $post['description']; ?></p>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row gx-1">
        <div class="col-1"></div>
        <div class="col-10 text-end">
            <p class="text-break"><?php echo substr($post['date_time'], 0, -3); ?></p>
        </div>
        <div class="col-1"></div>
    </div>
</article>