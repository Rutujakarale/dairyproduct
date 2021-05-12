<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['session_userid']);
unset($_SESSION['session_username']);
unset($_SESSION['adminlogin']);
unset($_SESSION['session_adminid']);
unset($_SESSION['session_systemuser_name']);


session_destroy();
header('location:index.php');

?>