<?php

function registerLoggedUser($user){
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["user_img"] = $user["user_img"];
}

function isUserLoggedIn() {
    return !empty($_SESSION["username"]) && !empty($_SESSION["email"]) && !empty($_SESSION["user_img"]);
}

function savePostID($post_id) {
    $_SESSION["post_id"] = $post_id;
}

function saveNotifier($notifier_username) {
    $_SESSION["notifier"] = $notifier_username;
}

?>