<?php
$auth = 0;
require_once('lib/includes.php');

/*
 * TRAITEMENT DU FORMULAIRE
 * */

if(isset($_POST['username']) && ($_POST['password'])){
    $username = $db->quote($_POST['username']); // échappe les caractères qui poseraient soucis comme les guillemets
    $password = sha1($_POST['password']); // sha1 cripte les mdp
    $select = $db->query("SELECT * FROM users WHERE username=$username AND password='$password'");
    // pour savoir si un utilisateur a été trouvé : affiche 0 ou 1
   if($select->rowCount() > 0){
       $_SESSION['Auth'] = $select->fetch(); // Auth est un paramètre qui sauvegarde l'index
       setFlash('Vous êtes maintenant connecté');
       header('Location:' . SITE_URL . 'admin/index.php'); //redirection de l'user
       die();
   }
}

/*
 * INCLUSION DU HEADER
 * */
require_once ('partials/admin_header.php') ;

?>

<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>Veuillez vous connecter.</p>

<form action="#" method="POST">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <?= input('username'); ?>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-default">Se connecter</button>
</form>

<script src="js/jquery-1.10.2.min.js"></script>
<script>
    $(document).ready(function (){
        $('#deco').hide();
    });
</script>