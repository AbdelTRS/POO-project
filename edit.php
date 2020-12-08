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


    if (isset($_POST['update'])) 
    { 
      $db = new DB_con();
      $db = $db->ret_obj();
      
      $query = "UPDATE users SET uname='" . $_POST['uname'] . "', uemail='" . $_POST['uemail'] . "', fullname='" . $_POST['fullname'] . "' WHERE uid ='" . $_POST['uid'] . "' ";

      $db->query($query);
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
          Modifier mes informations
    	</h1>

        <form action="" method="post">
        <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
            <div class="form-group">
                <label for="name">Nom prénom</label>
                <input type="text" name="fullname">
            </div>

            <div class="form-group">
                <label for="nickname">Pseudo</label>
                <input type="text" name="uname">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="uemail">
            </div>

            <button type="submit" class="btn" name="update"> Modifier </button>
        </form>
      </div>
      <div id="footer">
      Projet réalisé par Abdel, Yann, Adrien, et Romain - IIM 2020
      </div>
    </div>
  </body>

  </html>