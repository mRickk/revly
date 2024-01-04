<?php

function registerLoggedUser($user){
    $_SESSION["user_img"] = $user["user_img"];
    $_SESSION["username"] = $user["username"];
}

?>