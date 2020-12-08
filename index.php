<?php 
session_start();
    include_once 'include/class.user.php';
    include_once 'include/db_config.php';
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
        <table class="table table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nom Prénom</th>
              <th scope="col">Pseudo</th>
              <th scope="col">Email</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>

            <td><?php $user->get_fullname($uid); ?></td>
            <td><?php $user->get_username($uid); ?></td>
            <td><?php $user->get_email($uid); ?></td>
    
            <td><a href="edit.php" class="btn">Modifier</a></td>
          </tbody>
        </table>
      </div>
      <div id="footer">
      Projet réalisé par Abdel, Yann, Adrien, et Romain - IIM 2020
      </div>
    </div>
  </body>

  </html>