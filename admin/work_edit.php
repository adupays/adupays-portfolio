<?php
require_once '../lib/includes.php';

/**
* LA SAUVEGARDE
**/
if(isset($_POST['name']) && isset($_POST['slug'])){
    checkCsrf(); // check si le csrf est valide
    $slug = $_POST['slug'];
    if(preg_match('/^[a-z\-0-9]+$/', $slug)){ // Expression régulière
        $name = $db->quote($_POST['name']); // échappe les caractères
        $slug = $db->quote($_POST['slug']);
        $category_id = $db->quote($_POST['category_id']);
        $content = $db->quote($_POST['content']);

        /**
         * sauvegarde de la réalisation
         **/

        if(isset($_GET['id'])){
            $id = $db->quote($_GET['id']);
            $db->query("UPDATE works SET name=$name, slug=$slug, content=$content, category_id=$category_id WHERE id=$id"); // Mise à jour dans la bdd
        }else {
            $db->query("INSERT INTO works SET name=$name, slug=$slug, content=$content, category_id=$category_id"); // Insertion dans la bdd
            $db->lastInsertId(); // permet de récupérer le dernier ID
        }
        setFlash('La réalisation a bien été ajoutée'); // message de confirmation

        /**
         * envoi des images
         **/

        $work_id = $db->quote($_GET['id']);
        $files = $_FILES['images'];
        $images = array();
        require '../lib/image.php';
        // n'accepter que les .jpg
        foreach($files['tmp_name'] as $k => $v){
            $image = array(
                'name' => $files['name'][$k],
                'tmp_name' => $files['tmp_name'][$k]
            );
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            if(in_array($extension, array('jpg', 'png'))){
                $db->query("INSERT INTO images SET work_id=$work_id, name = ''");
                $image_id = $db->lastInsertId();
                $image_name = $image_id . '.' . $extension;
                // mettre l'img uploadé dans le bon dossier work
                move_uploaded_file($image['tmp_name'], IMAGES . '/works/' . $image_name);
                resizeImage(IMAGES . '/works/' . $image_name, 540,310);
                resizeImage(IMAGES . '/works/' . $image_name, 350,230);
                $image_name = $db->quote($image_name);
                $db->query("UPDATE images SET name=$image_name WHERE id = $image_id");
            }
        }
        header('Location:work.php'); // redirection
        die();
    }else{
        setFlash('Le slug n\'est pas valide', 'danger'); // message d'erreur
    }


}


/**
* On récupère une réalisation
**/
if(isset($_GET['id'])){ // Récupère les infos si qq chose a été passé en dans lurl
    $id = $db->quote($_GET['id']);
    $select = $db->query("SELECT * FROM works WHERE id=$id");
    if($select->rowCount() == 0){ // gestion de l'erreur, pas de catégorie trouvé
        setFlash('Il n\'y a pas de réalisation avec cet ID', 'danger');
        //header('Location:work.php'); // redirection
        die();
    }
    $_POST = $select->fetch(); // remplit automatiquement le formulaire en récupérer l'ID passsé en GET
}

/**
 * Suppression d'une image
 **/
if(isset($_GET['delete_image'])){
    checkCsrf();
    $id = $db->quote($_GET['delete_image']); // récupération de l'id
    $select= $db->query("SELECT name, work_id FROM images WHERE id=$id"); // sélection de l'image
    $image = $select->fetch(); // tableau associatif
    // quand suppression d'une image, supprimé également l'image redimensionnée
    $images=glob(IMAGES . '/works/' . pathinfo($image['name'], PATHINFO_FILENAME) . '_*x*.*');
    if(is_array($images)){
        foreach($images as $v){
            unlink($v);
        }
    }
    unlink(IMAGES . '/works/' . $image['name']); // suppression de l'image dans le dossier du site
    $db->query("DELETE FROM images WHERE id=$id"); // suppression de la bdd
    setFlash("L'image a bien été supprimée");
    header('Location:work_edit.php?id=' . $image['work_id']); // redirection vers la page de la réalisation
    die();
}

/**
 * Mise en avant d'une image
 **/
if(isset($_GET['highlight_image'])){
    checkCsrf();
    $work_id= $db->quote($_GET['id']);
    $image_id = $db->quote($_GET['highlight_image']);
    $db->query("UPDATE works SET image_id=$image_id WHERE id=$work_id");
    setFlash("L'image a bien été mise en avant");
    header('Location:work_edit.php?id=' . $_GET['id']); // redirection vers la page de la réalisation
    die();
}

/**
 * On récupère la liste des catégories
 **/
$select = $db->query('SELECT id, name FROM categories ORDER BY name ASC');
$categories = $select->fetchAll();
$categories_list = array();
foreach($categories as $category){
    $categories_list[$category['id']] = $category['name'];
}


/**
* On récupère la liste des images
**/
// Ne récupérer que celles qui correspondent à la réalisation demandée
if(isset($_GET['id'])){
    $work_id = $db->quote($_GET['id']);
    $select = $db->query("SELECT id, name FROM images WHERE work_id=$work_id");
    $images = $select->fetchAll();
}else{
    $images = array();
}

require_once '../partials/admin_header.php';

?>

    <h1>Éditer une réalisation</h1>

    <div class="row">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="name">Nom de la réalisation</label>
                    <?= input('name'); ?>
                </div>
                <div class="form-group">
                    <label for="slug">URL de la réalisation</label>
                    <?= input('slug'); ?>
                </div>
                <div class="form-group">
                    <label for="slug">Contenu de la réalisation</label>
                    <?= textarea('content'); ?>
                </div>
                <div class="form-group">
                    <label for="slug">Catégorie</label>
                    <?= select('category_id', $categories_list); ?>
                </div>
                <?= csrfInput(); // ajout d'un champs caché pour passer le csrf ?>
                <button type="submit" class="btn btn-default">Enregistrer</button>
            </div>

            <div class="col-sm-4">
                <?php foreach($images as $k => $image): ?>
                <p>
                    <img src="<?= SITE_URL; ?>img/works/<?= $image['name']; ?>" width="100">
                    <a href="?delete_image=<?= $image['id']; ?>&<?= csrf(); ?>" onclick="return confirm('Confirmer la suppression ?');">Supprimer</a>
                    <a href="?highlight_image=<?= $image['id']; ?>&id=<?= $_GET['id']; ?>&<?= csrf(); ?>">Mettre à la une</a>
                </p>
                 <?php endforeach ?>

                <div class="form-group">
                    <input type="file" name="images[]">
                    <input type="file" name="images[]" class="hidden" id="duplicate">
                </div>
                <p>
                    <a class="btn btn-success" href="#" id="duplicatebtn">Ajouter une image</a>
                </p>
            </div>
        </form>
    </div>
<?php require_once '../partials/admin_footer.php'; ?>

