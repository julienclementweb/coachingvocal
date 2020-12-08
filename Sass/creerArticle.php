<?php
session_start();

include "script.php";

$title = $_POST['title'];
$_SESSION['title'] = $title ;
$post = $_POST['post'];
$id_user = $_SESSION['id_user'];

$pdo = getPDO($config);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $pdo->prepare('INSERT INTO entries (title, post, date_post, id_user)  VALUES(?,?,NOW(),?)');
$req->execute(array($title, $post, $id_user));

header('Location: blogEntry.php');

?>