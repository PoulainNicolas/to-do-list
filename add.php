
<?php
include 'connexion.php';

// sanitization

if (isset($_POST['todo']) || !empty($_POST['todo'])) {
    // $options= array('todo' => FILTER_SANITIZE_STRING);

        $result = filter_input(INPUT_POST, 'todo', FILTER_SANITIZE_STRING);

        // $result= filter_input_array(INPUT_POST, $options);

            if($result !== null AND $result !== FALSE){     
                $requete = $db->exec('INSERT INTO todo (todo, archive) VALUES("'.$result.'", 0)');
            }
    
}
    header('Location: index.php');
?>