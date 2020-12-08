<?php

session_start();

$_SESSION['title'] = $_POST['title'] ;

header ('Location: blogEntry.php');