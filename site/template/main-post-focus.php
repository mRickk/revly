<?php
require_once("post.php");
foreach($templateParams["comments"] as $comment) {
    require("comment.php");
}
?>