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

    $db = new PDO('mysql:host=localhost;dbname=poo_bdd;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $sql = "SELECT COUNT(*) FROM chat";
    $res = $db->query($sql);
    $count = $res->fetchColumn();
    $word = "0";
    if (strpos($count, $word) !== false) {
        $query = $db->prepare('INSERT INTO chat SET chatname = :chatname, content = :content, date_hour = NOW()');
        $query->execute([
      "chatname" => "",
      "content" => "Bienvenue sur le chat ! ~"]);
    }
?>
	
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/chatbox.css">
    <title>Chatbox</title>
</head>
<body>
    

<section class="chat">

<h1 class="chatbox_button">Chatbox</h1>
<img src="img/chat.png" alt="Chatbox" class="button_icon">

<div class="messages">

</div>

<div class="user_input">
<form action="php/handler.php?task=write" method="POST" class="form_chat">
    <input type="text" id="content" name="content" Placeholder="Messages" autocomplete="off">
    <button type="submit">Envoyer</button>
</form>

</div>

</section>
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/chat.js"></script>
</body>
</html>