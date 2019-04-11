<?php
    include 'connexion.php';

header('Location:index.php');

if(isset($_POST['delete'])){
        if (isset($_POST['checkbox'])) {
           for ($i=0; $i < count($_POST['checkbox']) ; $i++) { 
             $delete = $db->exec('DELETE FROM done WHERE done ="'.$_POST['checkbox'][$i].'"');
           }
        }
     }
?>