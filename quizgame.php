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

<?php 
global $db;
$GetName = ("SELECT quizname FROM quiz WHERE id=21");
$nameofSurv = $db->query($GetName);
$test = $nameofSurv->fetchAll();
print_r($test);

?>

</section>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/quiz.js"></script>
</body>
</html>