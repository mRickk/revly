<?php
require_once("post.php");
foreach($templateParams["comments"] as $comment) {
    require("comment.php");
}
if (isUserLoggedIn()):?>
    <form action="#" method="POST">
        <div class="d-flex">
            <div class="form-group mb-3">
                <label class="d-none" for="inputComment">Comment</label>
                <input type="text" class="form-control rounded" id="inputComment" name="comment" placeholder="Write a comment..." required/>
            </div>
            <button class="bi bi-send" type="submit" name="submit" value="SUBMIT">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                </svg>
            </button>
        </div>
    </form>
<?php else:
    header("Location: index.php");
endif;?>