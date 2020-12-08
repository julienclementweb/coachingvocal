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

function getNews (PDO $pdo, int $id_news) {
    $requete = "SELECT n.id_news,n.titre,n.resume,n.contenu,n.datenews,u.pseudo FROM news n, users u WHERE n.id_user = u.id_user AND id_news=$id_news";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLast5News (PDO $pdo) {
    $requete = "SELECT n.id_news,n.titre,n.resume,n.contenu,n.datenews,u.pseudo FROM news n, users u WHERE n.id_user = u.id_user ORDER BY id_news DESC LIMIT 5";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLastNews (PDO $pdo) {
    $requete = "SELECT n.id_news,n.titre,n.resume,n.contenu,n.datenews,u.pseudo FROM news n, users u WHERE n.id_user = u.id_user ORDER BY id_news DESC LIMIT 1";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function deleteNews (PDO $pdo, int $id_news):void {
    $requete = $pdo -> prepare("DELETE FROM news WHERE id_news=$id_news");
    $requete -> execute();
}

function getTopicsForum (PDO $pdo) {
    $requete = "SELECT DISTINCT topic FROM forum ";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getTopicsUser (PDO $pdo, String $id_user) {
    $requete = "SELECT DISTINCT topic FROM forum WHERE id_user=$id_user";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLast2TopicsForum (PDO $pdo) {
    $requete = "SELECT DISTINCT topic FROM forum LIMIT 2";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getLastTopicPost (PDO $pdo, String $topic) {
    $requete = $pdo->prepare("SELECT f.topic,f.post,f.datepost,u.pseudo FROM forum f, users u WHERE f.id_user=u.id_user AND f.topic=\"$topic\" LIMIT 1");
    $requete -> execute();
    $resultat = $requete->fetch();
    return $resultat;
}

function getLast5PostsForum (PDO $pdo) {
    $requete = "SELECT f.id_post,f.topic,f.post,f.datepost,u.pseudo FROM forum f, users u WHERE f.id_user = u.id_user ORDER BY id_post DESC LIMIT 5";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getPostsForum (PDO $pdo) {
    $requete = "SELECT f.id_post,f.topic,f.post,f.datepost,u.pseudo FROM forum f, users u WHERE f.id_user = u.id_user";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function getPostsTopicForum (PDO $pdo, String $topic) {
    $requete = "SELECT f.id_post,f.topic,f.post,f.datepost,u.pseudo FROM forum f, users u WHERE f.id_user = u.id_user AND f.topic = \"$topic\"";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function deletePost (PDO $pdo, int $id_post):void {
    $requete = $pdo -> prepare("DELETE FROM forum WHERE id_post=\"$id_post\"");
    $requete -> execute();
}

function blockUser (PDO $pdo, int $id_user):void {
    $requete = $pdo -> prepare("UPDATE users SET blocked='1' WHERE id_user=\"$id_user\"");
    $requete -> execute();
}

function unblockUser (PDO $pdo, int $id_user):void {
    $requete = $pdo -> prepare("UPDATE users SET blocked=NULL WHERE id_user=\"$id_user\"");
    $requete -> execute();
}

function getMessages (PDO $pdo) {
    $requete = "SELECT c.id_message,c.heure,c.message,u.pseudo FROM chat c, users u WHERE c.id_user = u.id_user";
    $resultat = $pdo->query($requete);
    return $resultat;
}

function deleteMessage (PDO $pdo, int $id_message):void {
    $requete = $pdo -> prepare("DELETE FROM chat WHERE id_message=\"$id_message\"");
    $requete -> execute();
}
