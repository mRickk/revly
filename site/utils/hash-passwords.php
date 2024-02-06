<?php 

require("bootstrap.php");

$users = $db->getAllUsers();

foreach($users as $u) {
    $res = $db->updatePassword($u["username"], $u["email"], $u["password"], $u["password"]);
    if (!$res) {
        echo "ERROR";
        break;
    }
}

echo "ALL USERS PASSWORD HAS BEEN HASHED";


?>