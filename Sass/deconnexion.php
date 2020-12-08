<?php
session_start();
$_SESSION['id_user'] = NULL;
$_SESSION['name'] = NULL;
$_SESSION['password'] = NULL;
header('location: index.php');
?>