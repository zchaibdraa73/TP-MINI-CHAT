<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse=$bdd->query('SELECT pseudo, message FROM minichat2 ORDER BY ID DESC LIMIT 0, 10');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <body>
    <form action="minichat_post.php" method="post">
        <p><label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /></p>
        <p><label for="message">Messages</label> :  <input type="text" name="message" id="message" /></p>
        <input type="submit" value="Envoyer Message" />
    </form>
    <?php
    while($donnees = $reponse->fetch()){
        echo '<p>' . htmlspecialchars($donnees['pseudo']) . ':' . htmlspecialchars($donnees['message']) . '</p>';
    }

    $reponse->closeCursor();
    ?>
    </body>
</html>