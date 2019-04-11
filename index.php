<?php
    // L'instruction de langage include inclut et exécute le fichier spécifié en argument. 
    include 'connexion.php';

    // QUERY Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
    // le contenu de la db est stocké sous forme d'objet dans les variables $resultat et $resultArchive
    $resultat = $db->query('SELECT * FROM todo');
    $resultArchive = $db->query('SELECT * FROM done');

  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To do list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="display-4">Ma ToDoList</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 col-sm-6">
            <h2 class="display-6">A faire</h2>
            <form method="POST" action="archive.php">
            <div class="form-check"> 
                    <!-- pour afficher les données de la db, il faut faire un fetch()
                    sur la variable déclarée plus haut $resultat ($donnees donnera un array)
                    Ensuie faire un echo sur la var déclarée ($donnees) et la mettre dans une boucle
                    Pourquoi echo $donnees ne fonctionne pas sans nom de la colonne-->
                    <?php while($donnees = $resultat->fetch())
                    {
                        // print_r($resultat);
                        // print_r ($donnees);
                        // Une chaîne de caractères (DOMString) qui représente la valeur de la case à cocher. 
                        // Cette chaîne de caractères n'est pas affichée côté client mais est envoyée au serveur comme 
                        // valeur associée à la donnée envoyée avec le nom de la case à cocher. 
                        echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="checkbox[]" value="'.$donnees['todo'].'">
                        <label>' .$donnees['todo'] . '</label></div>';
                    } 
                    $resultat->closeCursor();
                    ?>
            </div>
            
            <button type="submit" class="btn btn-outline-primary" name="submit">Fait</button>
            </form>
        </div>

        <div class="col-lg-4 col-sm-6">
            <h2 class="display-6">Fait</h2>
            <form action="delete.php" method="POST">
            <div class="form-check">
                <?php 
                while($result = $resultArchive->fetch())
                    {
                        // print_r($resultArchive);
                        // print_r($result);
                        echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="checkbox[]" value="'.$result['done'].'">
                        <label>' .$result['done'] . '</label></div>';
                    } 
                    $resultArchive->closeCursor();
                ?>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="delete">Vider</button>

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h2 class="display-6">Ajouter des tâches</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <input type="text" name="todo" class="form-control" placeholder="Ecrivez une nouvelle tâche">
                </div>

                <button type="submit" name="add" class="btn btn-outline-primary">Enregistrer</button>
            </form>
        </div>

       
    </div>
   
</div>
   

</body>
</html>