<?php

function do_delete() {
$connexion = get_connexion();

if(isset($_POST['delete'])) {
  $tacheid = $_POST['delete'];

  $query = $connexion->prepare('DELETE FROM tache WHERE tacheid = :tacheid');
  $query->bindParam(":tacheid", $tacheid);
  $query->execute();
}

}

function do_edit() {
$connexion = get_connexion();

  if(isset($_POST['edit'])){

    $labeltache = $_POST['labeltache'];
    $tacheid = $_POST['edit'];
    $description = $_POST['description'];

    $query = $connexion->prepare('UPDATE tache SET labeltache = :labeltache WHERE tacheid = :tacheid; UPDATE tache SET description = :description WHERE tacheid = :tacheid;');
    $query->bindParam(":labeltache", $labeltache);
    $query->bindParam(":tacheid", $tacheid);
    $query->bindParam(":description", $description);
    $query->execute();

  }

}


function do_signout() {
  session_start();
  $_SESSION = array();
  session_destroy();
  header('location: connexionController.php');

}
function do_connexion() {
  session_start();

  $connexion = get_connexion();

  if(isset($_POST['envoyer'])) {
    $login = htmlspecialchars(strtolower($_POST['login']));
    $pwd = sha1($_POST['pwd']);

  if(isset($login, $pwd)) {
    $query = $connexion->prepare('SELECT * FROM user WHERE login = ? AND password = ?');
    $query->execute(array($login, $pwd));
    $user_exist = $query->rowCount();

  if ($user_exist == 1) {
    $user_data = $query->fetch();
    $_SESSION['id'] = $user_data['userid'];
    $_SESSION['email'] = $user_data['login'];

    header('location: ../index.php');

  } else {

    header('location: inscriptionController.php');
  }

  }
    }
}



function do_inscription() {
  $connexion = get_connexion();

  if (isset($_POST['envoyer'])){
  $login = htmlspecialchars(strtolower($_POST['login']));
  $pwd = sha1($_POST['pwd']);

  if (isset($login, $pwd)) {
    $query = $connexion->prepare('INSERT into user (login, password) VALUES (?, ?)');
    $query->execute(array($login, $pwd));
    header('location: confirmationSubscribe.php');
  }
}
}

//selectionne les infos de la bdd
function do_select() {
  $connexion = get_connexion();
  $sql = $connexion->query('SELECT * FROM tache');
  return $sql;
}

//traitement de mon formulaire (envoi de tâches dans la bdd)
function do_creation(){
    $connexion = get_connexion();
    $query = $connexion->prepare('INSERT into tache (labeltache, description, categorie) VALUES (?, ?, ?)');
    if(isset($_POST['labeltache'], $_POST['description'], $_POST['categorie'])){
      $query->execute(array($_POST['labeltache'], $_POST['description'], $_POST['categorie']));

    }
    else {
      echo '';
    }
    return $query;

  }

  //connection à la  bdd
function get_connexion() {
  $connexion = new PDO('mysql:host=localhost; dbname=Project_todo; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $connexion;
}



/*function read_all() {
$query =
'SELECT * FROM tache';*/
