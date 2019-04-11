<?php
    try
    {        
        $db = new PDO('mysql:host=localhost;dbname=todolist; charset=utf8', 'user', 'password');
    }

    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>