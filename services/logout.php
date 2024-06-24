<?php
session_start();
$_SESSION=array();//unset all the session variables
session_destroy();//destroy the session
//redirect
header('Location:../login.php');
exit;