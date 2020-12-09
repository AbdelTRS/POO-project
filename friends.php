<?php 
    session_start();

    require 'include/class.friends.php';
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

    $db = new DB_con();
    $db = $db->ret_obj();

    $query = $db->prepare("SELECT * FROM users");
    $query->execute();

    if($query){
        while($fetch = $query->fetch()){
            $id = $fetch['uid'];
            $username = $fetch['uname'];
        }
    }

?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Projet POO Ajax SQL - Friends</title>
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
        <h1>
          Liste d'amis
    	</h1>
        <br/>
        <h3><?php $user->get_fullname($uid); ?></h3>
        <br/>
        <div>
        <?php 
            if($id = $_SESSION['uid']){
                if(Friends::renderFriendShip($_SESSION['uid'], $id, 'requestPending') == 1) {
        ?>
            <button class="btn" disabled>Request Pending</button>
        <?php

                }
            }else {

            }
        ?>
        </div>
      </div>
      <div id="footer">
      Projet réalisé par Abdel, Yann, Adrien, et Romain - IIM 2020
      </div>
    </div>
  </body>

  </html>