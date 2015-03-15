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
    $db->query("DELETE FROM works WHERE id=$id");
    setFlash('La réalisation a bien été supprimée');
    header('Location:work.php');
    die();
}

/**
 * REALISATIONS
 **/
$select = $db->query('SELECT id, name, slug FROM works ORDER BY id ASC ');
$works = $select->fetchAll();

?>

<h1>Mes réalisations</h1>

    <p><a class="btn btn-success" href="work_edit.php">Ajouter une nouvelle réalisation</a></p>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($works as $work): ?>
        <tr>
            <td><?= $work['id']; ?></td>
            <td><?= $work['name']; ?></td>
            <td>
                <a href="work_edit.php?id=<?= $work['id']; ?>" class="btn btn-default">Éditer</a>
                <a href="?delete=<?= $work['id']; ?>&<?= csrf(); ?>" class="btn btn-error" onclick="return confirm('Veuillez confirmer la suppression.');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../partials/admin_footer.php'; ?>