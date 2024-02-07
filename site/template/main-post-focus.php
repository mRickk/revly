<section id="commentContainer">
    <?php
    require_once("post.php");
    foreach($templateParams["comments"] as $comment) {
        require("comment.php");
    }
    ?>
</section>
<?php if (isUserLoggedIn()): ?>
    <form id="commentForm" method="POST">
        <div class="row gx-1 mb-3 align-middle">
            <div class="col-10">
                <div class="form-group">
                    <label class="visually-hidden" for="inputComment">Comment</label>
                    <input type="text" class="form-control rounded-pill" id="inputComment" name="comment" placeholder="Write a comment..." required/>
                </div>
            </div>
            <div class="col-2 p-0 text-end">
                <button class="btn btn-outline-dark bi bi-send rounded-4" type="submit" name="submit" value="SUBMIT">
                    <span class="visually-hidden">Send comment</span>
                </button>
            </div>
        </div>
    </form>
<?php else:
    header("Location: index.php");
endif;?>