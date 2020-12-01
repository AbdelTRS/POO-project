<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Succes
	       header("location:index.php");
	    } else {
	        // Erreur
	        echo "<div style='text-align:center'>Pseudo ou mot de passe incorrects</div>";
	    }
	}
?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Projet POO Ajax SQL</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

  <body>
    <div id="container" class="container">
      <h1>Se connecter</h1>
      <form action="" method="post" name="login">
        <table class="table " width="400">
          <tr>
            <th>Pseudo ou mail:</th>
            <td>
              <input type="text" name="emailusername" required>
            </td>
          </tr>
          <tr>
            <th>Mot de passe:</th>
            <td>
              <input type="password" name="password" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn" type="submit" name="submit" value="Se connecter" onclick="return(submitlogin());">
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><a href="registration.php">S'inscrire</a></td>
          </tr>

        </table>
      </form>
    </div>
<script src="assets/js/script.js" />


  </body>