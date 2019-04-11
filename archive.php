<?php
    include 'connexion.php';

    header('Location: index.php');
    // $checkbox = $_POST['checkbox'];

    if(isset($_POST['submit'])){
            if(isset($_POST['checkbox'])){
                for ($i=0; $i < count($_POST['checkbox']) ; $i++) { 
                    $archive = $db->exec('INSERT INTO done (done) VALUES("'.$_POST['checkbox'][$i].'")');
                    // je dois supprimer 
                    $delete = $db->exec('DELETE FROM todo WHERE todo ="'.$_POST['checkbox'][$i].'"');
                }
            }
        }           
?>