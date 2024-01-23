<?php

if (isset($templateParams["notifications"]) && count($templateParams["notifications"]) > 0) {
    foreach ($templateParams["notifications"] as $notification) {
        include 'notification.php';
    }
} else {
    echo '<p>No notifications found</p>';
}
?>
