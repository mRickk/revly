<?php
require_once("bootstrap.php");

sec_session_start();
session_destroy();

header("Location: index.php");

?>