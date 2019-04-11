
<?php

include 'connexion.php';

    // déclaration variables et récupération POST
    $todo = $_POST["todo"];
    
    
    $requete = $db->exec('INSERT INTO todo (todo, archive) VALUES("'.$todo.'", 0)');

    header('Location: index.php');
?>

   