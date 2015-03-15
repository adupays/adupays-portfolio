<?php
require_once '../lib/includes.php';

/**
 * AJOUT DANS LA BDD
 **/

if(isset($_POST['name']) && isset($_POST['slug'])){
    checkCsrf(); // check si le csrf est valide
    $slug = $_POST['slug'];
    if(preg_match('/^[a-z\-0-9]+$/', $slug)){ // Expression régulière
        $name = $db->quote($_POST['name']); // échappe les caractères
        $slug = $db->quote($_POST['slug']);
        if(isset($_GET['id'])){
            $id = $db->quote($_GET['id']);
            $db->query("UPDATE categories SET name=$name, slug=$slug WHERE id=$id"); // Mise à jour dans la bdd
        }else {
            $db->query("INSERT INTO categories SET name=$name, slug=$slug"); // Insertion dans la bdd
        }
        setFlash('La catégorie a bien été ajoutée'); // message de confirmation
        header('Location:category.php'); // redirection
        die();
    }else{
        setFlash('Le slug n\'est pas valide', 'danger'); // message d'erreur
    }
}

/**
 * EDITION DANS LA BDD
 **/

if(isset($_GET['id'])){ // Récupère les infos si qq chose a été passé en dans lurl
    $id = $db->quote($_GET['id']);
    $select = $db->query("SELECT * FROM categories WHERE id=$id");
    if($select->rowCount() == 0){ // gestion de l'erreur, pas de catégorie trouvé
        setFlash('Il n\'y a pas de catégorie avec cet ID', 'danger');
        header('Location:category.php'); // redirection
        die();
    }
    $_POST = $select->fetch(); // remplit automatiquement le formulaire en récupérer l'ID passsé en GET
}


require_once '../partials/admin_header.php';
?>

    <h1>Éditer une catégorie</h1>

    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <?= input('name'); ?>
        </div>
        <div class="form-group">
            <label for="slug">URL de la catégorie</label>
            <?= input('slug'); ?>
        </div>
        <?= csrfInput(); // ajout d'un champs caché pour passer le csrf ?>

        <button type="submit" class="btn btn-default">Enregistrer</button>
    </form>


<?php require_once '../partials/admin_footer.php'; ?>