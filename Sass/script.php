<?php

$config = array('host' => 'localhost', 'port' => '3306', 'dbname' => 'coachingvocal', 'charset' => 'utf8', 'username' => 'root', 'password' => '');

function getPDO(array $config) {
    try {
        return new PDO('mysql:host='.$config['host'].':'.$config['port'].';dbname='.$config['dbname'].';charset='.$config['charset'].'', ''.$config['username'].'', ''.$config['password'].'');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getUser (PDO $pdo, String $name, String $password) {
    $requete = $pdo->prepare("SELECT id_user,name,password FROM users WHERE name=? AND password=?");
    $requete -> execute(array($name,$password));
    $resultat = $requete->fetch();
    return $resultat;
}

function getUsers (PDO $pdo) {
    $requete = "SELECT id_user,name,password FROM users";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getTopicsForum (PDO $pdo) {
    $requete = "SELECT DISTINCT title FROM entries ";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getTopicsUser (PDO $pdo, String $id_user) {
    $requete = "SELECT DISTINCT title FROM entries WHERE id_user=$id_user";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLast2TopicsForum (PDO $pdo) {
    $requete = "SELECT DISTINCT title FROM entries LIMIT 2";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLastTopicPost (PDO $pdo, String $title) {
    $requete = $pdo->prepare("SELECT e.title,e.post,e.date_post,u.name FROM entries e, users u WHERE e.id_user=u.id_user AND e.title=\"$title\" LIMIT 1");
    $requete -> execute();
    $resultat = $requete->fetch();
    return $resultat;
}

function getLast5PostsForum (PDO $pdo) {
    $requete = "SELECT e.id_entry,e.title,e.post,e.date_post,u.name FROM entries e, users u WHERE e.id_user = u.id_user ORDER BY id_post DESC LIMIT 5";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getPostsForum (PDO $pdo) {
    $requete = "SELECT e.id_entry,e.title,e.post,e.date_post,u.name FROM entries e, users u WHERE e.id_user = u.id_user";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getPostsTopicForum (PDO $pdo, String $title) {
    $requete = "SELECT e.id_entry,e.title,e.post,e.date_post,u.name FROM entries e, users u WHERE e.id_user = u.id_user AND e.title = \"$title\"";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function deletePost (PDO $pdo, int $id_post):void {
    $requete = $pdo -> prepare("DELETE FROM entries WHERE id_post=\"$id_post\"");
    $requete -> execute();
}
