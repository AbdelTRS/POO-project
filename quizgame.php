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

    $db = new PDO('mysql:host=localhost;dbname=poo_bdd;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $getdb = $db->query('SELECT * FROM quiz');
    $getstringdb = $getdb->fetchAll();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Devoir JavaScript</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/chatbox.css">
</head>
<body>
	<!-- Fenêtre popup -->
	<!-- <div class="popup">
		<div class="window">
			<input type="text" id="userInput">
			<button onclick="closePopup()" class="btn">Se connecter</button>
		</div>
	</div> -->


	<!-- QuizBox d'accueil -->
	<div class="home-box custom-box">
		<h3>Quizz</h3>
		<p>Cliquez pour commencer</p>
		<button type="button" class="btn" onclick="startQuiz()">Lancer le quiz</button>
	</div>

	<!-- QuizBox questions -->
	<div class="quiz-box custom-box hide">
		<div class="question-number">

		</div>
		<div class="question-text">

		</div>
		<div class="option-container">

		</div>
		<div class="next-question-btn">
			<button type="button" class="btn" onclick="next()">Next</button>
		</div>
		<div class="answers-indicator">

		</div>
	</div>

	<!-- QuizBox résultats -->
	<div class="result-box custom-box hide">
		<h1 class="title-result"></h1>
		<table>
			<tr>
				<td>Merci d'avoir participé</td>
				<td><span class="total-correct"></span></td>
			</tr>
			<tr>
				<td>Votre réponse à bien été reçue</td>
				<td><span class="percentage"></span></td>
			</tr>
			<tr>
				<td>Nombre total de personne ayant participé :</td>
				<td><span class="total-score">32</span></td>
			</tr>
		</table>
		<button type="button" class="btn" onclick="tryAgainQuiz()">Recommencer</button>
		<button type="button" class="btn" onclick="goToHome()">Accueil</button>
	</div>

<script>
    var getphptitle = '<?php echo($getstringdb[0]['quizname']); ?>'
    var getphp1 = '<?php echo($getstringdb[0]['rep1']); ?>';
    var getphp2 = '<?php echo($getstringdb[0]['rep2']); ?>';
    var getphp3 = '<?php echo($getstringdb[0]['rep3']); ?>';
    var getphp4 = '<?php echo($getstringdb[0]['rep4']); ?>';
</script>

<script src="assets/js/question.js"></script>
<script src="assets/js/app.js"></script>
<?php include 'chat.php';?>
</body>
</html>


