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

// Requête de la BDD + Sortir les 50 dernier messages + Traitement des 
// résultat + Affichage des données en JSON

function getMessages()
{
    // Indiquer à PHP que la variable $db existe en dehors de la fonction
    global $db;
    // Requête à la BDD afin de sortir les 50 derniers messages
    $resultat = $db->query("SELECT * FROM chat ORDER BY date_hour DESC LIMIT 50");
    // Traitement des résultats
    $messages = $resultat->fetchAll();
    // encodage des résultats obtenu sous le format JSON
    echo json_encode($messages);
}

function sendMessages()
{
    // Indiquer à PHP que la variable $db existe en dehors de la fonction
    global $db;
    global $uid;
    $GetName = $db->query("SELECT uname FROM users WHERE uid = $uid");
    $jsuname = $GetName->fetchAll();
    $author = $jsuname[0]['uname'];
    $content = $_POST['content'];

    if (!array_key_exists('content', $_POST)) {
        echo json_encode(["status" => "error", "message" => "Impossible d'envoyer le message"]);
        return;
    }
    $query = $db->prepare('INSERT INTO chat SET chatname = :chatname, content = :content, date_hour = NOW()');
    $query->execute([
      "chatname" => $author,
      "content" => $content
    ]);
}

