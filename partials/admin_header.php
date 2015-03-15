<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <!-- ==============================================
        Title and Meta Tags
        =============================================== -->
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Amandine Dupays'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Portfolio d'Amandine DUPAYS - Webdesigner Intégrateur Monteur vidéo">
    <meta name="author" content="Amandine DUPAYS">
    <meta name="keywords" content="graphiste, webdesigner, monteur, vidéo, intégrateur, paris, île de france, cameraman, cadreur, infographiste, multimédia, site internet">

    <title>Administration</title>

    <!-- ==============================================
        CSS
        =============================================== -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <!-- ==============================================
            Fonts
            =============================================== -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- ==============================================
    JS
    =============================================== -->

    <!--[if lt IE 9]>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="../js/modernizr.min.js"></script>

</head>

<body>

    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Administration</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="category.php">Gérer les Catégories</a>
                </li>
                <li>
                    <a href="work.php">Gérer les Réalisations</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../index.php">Retour au site</a>
                </li>
                <li>
                    <a href="../logout.php" id="deco">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

<div class="container">

    <?= flash(); ?>