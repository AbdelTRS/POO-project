<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<?php
session_start();
include_once '../include/class.user.php';
$user = new User();

$uid = $_SESSION['uid'];

// Protocoles de connection à la base de données

$db = new PDO('mysql:host=localhost;dbname=poo_bdd;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// On détermine si on récupère un message ou si on en écrit un
$task = "list";
if(array_key_exists("task", $_GET))
{
    $task = $_GET['task'];
}
if ($task == "write") {
    sendMessages();
} 
else 
{
    getMessages();
}


function getMessages()
{
    echo"test";
}

function sendMessages()
{
    // Indiquer à PHP que la variable $db existe en dehors de la fonction
    global $db;
    global $uid;
    
    $name = $_POST['quizname'];
    $description = $_POST['quizdescription'];
    $question = $_POST['quizquestion'];
    $rep1 = $_POST['quizanswer1'];
    $rep2 = $_POST['quizanswer2'];
    $rep3 = $_POST['quizanswer3'];
    $rep4 = $_POST['quizanswer4'];
    $rep5 = $_POST['quizanswer5'];
    $rep6 = $_POST['quizanswer6'];
    
    $query = $db->prepare('INSERT INTO quiz SET quizname = :quizname, quizdescription = :quizdescription, question = :question, rep1 = :rep1, rep2 = :rep2, rep3 = :rep3, rep4 = :rep4, rep5 = :rep5, rep6 = :rep6');
    $query->execute([
        "quizname" => $name,
        "quizdescription" => $description,
        "question" => $question,
        "rep1" => $rep1,
        "rep2" => $rep2,
        "rep3" => $rep3,
        "rep4" => $rep4,
        "rep5" => $rep5,
        "rep6" => $rep6]);

        echo "<h1 align='center'>Votre sondage a été créer</h1>";
        echo "<a href='../quizgame.php' class='btn' style='display:block;margin:auto;'>Tester le sondage !</a>";

}




