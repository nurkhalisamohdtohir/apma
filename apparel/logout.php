<?php
session_start();
unset($_SESSION['login_user']);
session_destroy();
header("Location: index.php"); /*bring to login form (index.php)*/
exit;
?>