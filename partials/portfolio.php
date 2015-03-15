<?php
/**
* Récupérer les travaux
**/
$condition = '';
$category = false;
if(isset($_GET['category'])){
    $slug = $db->quote($_GET['category']);
    $select = $db->query("SELECT * FROM categories WHERE slug=$slug");
    if(!isset($_GET['category'])){
        header("HTTP/1.1 301 Moved Permanently"); // Indique à Google que le déplacement est définitif, view.php pas indexé
        header:('Location:' . SITE_URL);
        die();
    }
    $category = $select->fetch();
    $condition = " WHERE works.category_id=" . $category['id'];
}

$sQuery = <<<SQL
    SELECT
    works.id, works.name, works.content, works.slug, images.name as image_name, works.category_id, categories.name as cat_name
FROM works
LEFT JOIN images ON images.id = works.image_id
LEFT JOIN categories ON categories.id = works.category_id
ORDER BY works.id ASC
{$condition}
SQL;

$works = $db->query($sQuery)->fetchAll(); // on récupère les travaux dans la bdd

/**
* Récupérer les catégories
**/
$categories = $db->query("SELECT slug, name FROM categories")->fetchAll();

if($category){
$title = "Mes réalisations {$category['name']}";
}else{
$title = "Amandine Dupays | Portfolio";
}

?>


        <!-- ==============================================
        PORTFOLIO
        =============================================== -->     
        <section  id="portfolio">
        
            <div id="portfolio-header" class="text-center">
                
                <h1 class="section-title scrollimation scale-in">Mes <span>réalisations</span><i class="icon-pencil"></i></h1>
                
                <!--==== Portfolio Filters ====-->
                <div id="filter-works">
                    <ul>
                        <li class="active">
                            <a href="#" data-filter="*">Tous</a>
                        </li>

                        <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="#" data-filter=".<?= $category['name']; ?>"><?= $category['name']; ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div><!--End portfolio filters -->
                
            </div><!--End portfolio header -->
            
            <div class="container masonry-wrapper scrollimation fade-in">
            
                <div id="projects-container">
                
                    <!-- ==============================================
                    SINGLE PROJECT ITEM
                    =============================================== -->
                    <?php foreach($works as $k => $work):
                    $sQuery = <<<SQL
SELECT
    *
FROM
    images
WHERE
    work_id = {$work['id']}
SQL;

                    $aImages = $db->query($sQuery)->fetchAll(); // on récupère les travaux dans la bdd
                    ?>
                    <a class="project-item <?= $work['cat_name']?>" href=<?= SITE_URL ; ?>realisation/<?= $work['slug']; ?> data-images="<?php $sSepa = '';  foreach ($aImages as $aImage) {if ($aImage['name'] != '') { echo $sSepa;  ?>img/works/<?= resizedName($aImage['name'], 540, 310); ?><?php $sSepa = ','; }}?>">
                        <img class="img-responsive project-image" src="<?= SITE_URL ; ?>img/works/<?= resizedName($work['image_name'], 350, 230); ?>" alt="<?= $work['image_name'] ?>"><!--Project thumb -->

                        <div class="hover-mask">
                            <h2 class="project-title"><?= $work['name']; ?></h2><!--Project Title -->
                            <p><?= $work['cat_name']?></p><!--Project Subtitle -->
                        </div>

                    <!--==== Project Preview HTML ====-->

                    <div class="sr-only project-description">
                        <?= $work['content']?>
                        <?php
                        $sSepa = '';
                        foreach ($aImages as $aImage) {
                            if ($aImage['name'] != '')
                                echo '<p class="col-sm-6"><img class="img-responsive" src="img/works/' . $aImage['name'] . '" alt="" /></p>';
                        }
                        ?>

                    </div>
                    <?php endforeach ?>
                    </a><!--End Project Item -->

                </div><!-- End projects -->

            </div><!-- End container -->

            <!-- ==============================================
            PROJECT PREVIEW MODAL (Do not alter this markup)
            =============================================== -->
            <div id="project-modal" class="modal fade">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <div class="modal-body">

                            <div class="left-col">
                                <img class="img-responsive" src="img/imac.png" alt="">
                                <div class="loader"></div>
                                <div class="image-wrapper"></div>
                            </div>

                            <h1></h1>

                            <div class="project-descr"></div>

                            <div class="clearfix"></div>

                            <!-- <p class="text-center"><a class="btn btn-theme"><i class="icon-external-link"></i>Visiter le site</a></p> -->

                        </div><!-- End modal-body -->

                    </div><!-- End modal-content -->

                </div><!-- End modal-dialog -->

            </div><!-- End modal -->

        </section><!-- End portfolio section -->