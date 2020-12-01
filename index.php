<?php 
session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    // Deconnexion
    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Projet POO Ajax SQL - Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

<!-- Base stylisée par bootstrap -->

  <body>
    <div id="container" class="container">
      <div id="header">
        <a href="index.php?q=logout">Se déconnecter</a>
      </div>
      <div id="main-body">
        <br/>
        <br/>
        <br/>
        <br/>
        <h1>
                Bienvenue dans l'accueil du site <?php $user->get_fullname($uid); ?>
    			</h1>
      </div>
      <div id="footer">
      Projet réalisé par Abdel, Yann, Adrien, et Romain - IIM 2020
      </div>
    </div>
  </body>

  </html>