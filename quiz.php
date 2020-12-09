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
    <title>Sondage</title>
</head>
<body>
    
<section id="quiz">

<form action="php/sendQuiz.php?task=write" method="POST">
<input type="text" name="quizname" placeholder="Nom du sondage">
<input type="text" name="quizdescription" placeholder="Description" autocomplete="off">

<div>
<input type="text" name="quizquestion" placeholder="Question" autocomplete="off">
</div>

<div>
<input type="text" name="quizanswer1" placeholder="Réponse" autocomplete="off">

</div>

<div>
<input type="text" name="quizanswer2" placeholder="Réponse" autocomplete="off">

</div>

<div>
<input type="text" name="quizanswer3" placeholder="Réponse" autocomplete="off">

</div>

<div>
<input type="text" name="quizanswer4" placeholder="Réponse" autocomplete="off">

</div>

<div>
<input type="text" name="quizanswer5" placeholder="Réponse" autocomplete="off">

</div>

<div>
<input type="text" name="quizanswer6" placeholder="Réponse" autocomplete="off">

</div>

<button type="submit">Envoyer</button>
</form>

</section>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
</body>
</html>