<?php

function registerLoggedUser($user){
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["user_img"] = $user["user_img"];
}

function isUserLoggedIn() {
    return !empty($_SESSION["username"]) && !empty($_SESSION["email"]) && !empty($_SESSION["user_img"]);
}

?>