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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/quiz.css">
    <title>Chatbox</title>
</head>
<body>
    
<section id="quiz">

<form action="" method="POST" class="">

<input type="text" name="quizname" placeholder="Nom du sondage">
<input type="text" name="quizdescription" placeholder="Description">
<input type="text" name="quizquestions1" placeholder="Question 1">
<input type="text" name="quizquestions2" placeholder="Question 2">
<input type="text" name="quizquestions3" placeholder="Question 3">
<input type="text" name="quizquestions3" placeholder="Question 4">
<button type="submit">Envoyer</button>

</form>

</section>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/chat.js"></script>
</body>
</html>