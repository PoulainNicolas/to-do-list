<?php
header('Location: index.php');
    $donnees = $resultat->fetch();

    while($donnees = $resultat->fetch())
    {
        echo $donnees;
    }

    $resultat->closingCursor();

?>