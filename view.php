<?php
$auth = 0;
require_once 'lib/includes.php';
require_once 'lib/image.php';

if(!isset($_GET['slug'])){
    header("HTTP/1.1 301 Moved Permanently"); // Indique à Google que le déplacement est définitif, view.php pas indexé
    header:('Location:index.php');
    die();
}
$slug = $db->quote($_GET['slug']);
$select = $db->query("SELECT * FROM works WHERE slug = $slug");
if($select->rowCount() == 0 ){
    header("HTTP/1.1 301 Moved Permanently"); // Indique à Google que le déplacement est définitif, view.php pas indexé
    header('Location:index.php');
    die();
}
$work = $select->fetch();
$work_id = $work['id'];

$select = $db->query("SELECT * FROM images WHERE work_id = $work_id");
$images= $select->fetchAll();

$title = $work['name'];

require_once 'partials/header.php';
?>

    <h1><?= $work['name']; ?></h1>

    <?= $work['content']; ?>

<?php foreach($images as $k=>$image): ?>
    <p><img src="<?= SITE_URL; ?>img/works/<?= $image['name']; ?>" width="100%" alt=""/></p>
<?php endforeach ?>

<?php
require_once 'partials/footer.php' ;
?>