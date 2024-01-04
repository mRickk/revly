<?php

function registerLoggedUser($user){
    $_SESSION["password"] = $user["password"];
    $_SESSION["username"] = $user["username"];
}

?>