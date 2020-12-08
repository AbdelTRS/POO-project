<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])){
        extract($_POST);
        $register = $user->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) {
            // Inscription alert success
            echo "<div style='text-align:center'>Inscription terminée ! <a href='login.php'>Cliquez-ici</a> pour se connecter</div>";
        } else {
            // Inscription alert erreur
            echo "<div style='text-align:center'>Email ou Pseudonyme déjà utilisé</div>";
        }
    }
    
?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Projet POO Ajax SQL - Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

  <body>
    <div id="container" class="container">
      <h1>S'inscrire</h1>
      <form action="" method="post" name="reg">
        <table class="table">
          <tr>
            <th>Nom Prénom:</th>
            <td>
              <input type="text" name="fullname" required>
            </td>
          </tr>
          <tr>
            <th>Pseudonyme:</th>
            <td>
              <input type="text" name="uname" required>
            </td>
          </tr>
          <tr>
            <th>Email:</th>
            <td>
              <input type="email" name="uemail" required>
            </td>
          </tr>
          <tr>
            <th>Mot de passe:</th>
            <td>
              <input type="password" name="upass" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn" type="submit" name="submit" value="Register" onclick="return(submitreg());">
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><a href="login.php">Déjà inscrit ? Cliquez-ici pour vous connecter !</a></td>
          </tr>

        </table>
      </form>
    </div>

    <script src="assets/js/script.js" />
  </body>
  </html>