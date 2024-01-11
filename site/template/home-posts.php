<?php
if (isset($_POST["username"])) {
    $qry = "SELECT F.img, F.username, P.id_taggable, P.subject, P.img, P.evaluation, P.likes, P.description, P.date_time FROM follow F, post P WHERE F.user_email = P.author_email AND F.follower_email = $_POST["username"] ORDER BY P.date_time DESC";
}

?>
