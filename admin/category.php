<?php
require_once '../lib/includes.php';
require_once '../partials/admin_header.php';

/**
 * SUPPRESSION
 **/
if(isset($_GET['delete'])){
    checkCsrf();
    // Gérer les problèmes pouvant venir de l'user avec le quote : échappe les caractères
    $id = $db->quote($_GET['delete']);
    $db->query("DELETE FROM categories WHERE id=$id");
    setFlash('La catégorie a bien été supprimée');
    header('Location:category.php');
    die();
}

/**
 * CATEGORIES
 **/
$select = $db->query('SELECT id, name, slug FROM categories ORDER BY id ASC');
$categories = $select->fetchAll();

?>

<h1>Les catégories</h1>

    <p><a class="btn btn-success" href="category_edit.php">Ajouter une nouvelle catégorie</a></p>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category['id']; ?></td>
            <td><?= $category['name']; ?></td>
            <td>
                <a href="category_edit.php?id=<?= $category['id']; ?>" class="btn btn-default">Éditer</a>
                <a href="?delete=<?= $category['id']; ?>&<?= csrf(); ?>" class="btn btn-error" onclick="return confirm('Veuillez confirmer la suppression.');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>

</table>


<?php require_once '../partials/admin_footer.php'; ?>