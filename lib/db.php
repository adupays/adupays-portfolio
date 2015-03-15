<?php
// Gérer l'erreur de connection à la BDD
try {
    // se connecter à la BDD
    // $db = new PDO('mysql:host=mysql51-111.perso;dbname=amandinezbdd', 'amandinezbdd', '8MuCsn6SaqJD', array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $db = new PDO('mysql:host=localhost;dbname=amandinezbdd', 'root', 'admin');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // formate le fetch comme un tableau
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (Exception $e){
    echo 'Impossible de se connecter à la base de donnée';
    echo $e->getMessage();
    die ();
}
