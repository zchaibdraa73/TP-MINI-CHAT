<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOException $e)
{
        die('Erreur : '.$e->getMessage());
}

$req=$bdd->prepare('INSERT INTO minichat2 SET pseudo = ?, message = ?');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
?>