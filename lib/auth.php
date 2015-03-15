<?php
session_start(); // démarre la session
if(!isset($auth)){
    // s'il ne trouve pas d'id utilisateur, redirection
    if(!isset($_SESSION['Auth']['id'])){
        header('Location:../login.php');
        die();
    }
}

// Générer aléatoirement un jeton csrf pour empêcher de recharger la page delete ou qu'on la devine

if(!isset($_SESSION['csrf'])){
    $_SESSION['csrf'] = md5(time() + rand());
}

function csrf(){
    return 'csrf=' . $_SESSION['csrf'];
}
function csrfInput(){
    return '<input type="hidden" value="' . $_SESSION['csrf'] . '" name="csrf">';
}

// vérifier que le jeton passé en parametre est valable ou sinon bloque et redirige
function checkCsrf(){
    if(
        (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
        (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
        ){
        return true;
    }
     header('Location:' . SITE_URL . 'csrf.php');
     die();

}
