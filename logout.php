<?php
session_start();
$_SESSION = [];

session_unset();
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

session_destroy();

header("Location: login.php");
exit;
