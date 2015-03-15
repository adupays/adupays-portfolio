<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>

    <!-- ==============================================
        Title and Meta Tags
        =============================================== -->
        <meta charset="utf-8">
        <title><?= isset($title) ? $title : 'Amandine Dupays | Portfolio'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Portfolio d'Amandine DUPAYS - Webdesigner Intégrateur Monteur vidéo">
        <meta name="author" content="Amandine DUPAYS">
        <meta name="keywords" content="graphiste, webdesigner, monteur, vidéo, intégrateur, paris, île de france, cameraman, cadreur, infographiste, multimédia, site internet">

        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="icon" href="img/favicon.ico" />
        <link rel="icon" href="img/apple-touch-icon.png">
        <link rel="icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
        
        <!-- ==============================================
        CSS
        =============================================== -->    
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/theme.css">
        
        
        <!-- ==============================================
        Fonts
        =============================================== -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
        
        <!-- ==============================================
        JS
        =============================================== -->
            
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="js/modernizr.min.js"></script>

</head>

<body data-spy="scroll" data-target="#main-nav" data-offset="200">

    <!-- ==============================================
        MAIN NAV
        =============================================== -->
        <div id="main-nav" class="navbar navbar-fixed-top">
            <div class="container">
            
                <div class="navbar-header">
                
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    
                    <!-- ======= LOGO ========-->
                    <!--<a class="navbar-brand scrollto" href="#home">AMANDINE DUPAYS<br><span>Graphiste Intégratrice</span></a>-->
                     <a class="navbar-brand scrollto ir-logo" href="#home">AMANDINE DUPAYS<br><span>Graphiste Web Vidéo</span></a>
                
                </div>
                
                <div id="site-nav" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="sr-only">
                            <a href="#home" class="scrollto">Accueil</a>
                        </li>
                        <li>
                            <a href="#services" class="scrollto">Services</a>
                        </li>
                        <li>
                            <a href="#about" class="scrollto">À propos</a>
                        </li>
                        <li>
                            <a href="#portfolio" class="scrollto">Portfolio</a>
                        </li>
                        <li>
                            <a href="#contact" class="scrollto">Contact</a>
                        </li>
                    </ul>
                </div><!--End navbar-collapse -->
                
            </div><!--End container -->
            
        </div><!--End main-nav -->

            <!-- ==============================================
    HEADER
    =============================================== -->
    <header id="home" class="jumbotron">
    
        <div class="container">

            <div class="banniere">

                <img src="img/banniere.png" class="img-responsive" alt="banniere"/>

                <p>Bienvenue sur mon portfolio. Je suis graphiste, intégratrice et monteuse vidéo à Paris. J'aime créer des designs simples et clairs et innover grâce aux dernières approches du web.
                    Je suis disponible comme freelance ou à plein temps. <br/> Bonne visite !</p>

                <div id="arrow">
                    <a class="scrollto" id="linkDown" href="#services"><i class="icon-arrow-down" id="down"></i></a>
                </div>

            </div><!--End message-box -->






        </div><!--End container -->



    </header><!--End header -->

    <?= flash(); ?>
            