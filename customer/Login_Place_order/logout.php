<?php
session_start();
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['EMAIL']);
session_destroy();
header('location:../index.php');
die();
?>