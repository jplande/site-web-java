<?php
session_start();
require_once('class/Categories.php');
require_once('class/Client.php');
if(isset($_GET['logout'])){
    unset($_SESSION["cli"]);
}
$allCategories = Categories::getAllCategories();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ventes de chaussures</title>

    <meta property="locale" content="fr_FR" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Favicons -->
    <link href="img/logopage.png" rel="icon">
    <link href="img/logopage.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">



</head>

<body>

<!--==========================
Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="#hero" style="color : white"><h3>STYLESHOES</h3></img></a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!--<h1><a href="#hero">Regna</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li ><a href="index.php">Acceuil</a></li>
                <li class="menu-active" class="dropdown"><a href="#"><span>Marques</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <?php
                        foreach($allCategories as $categorie){
                            echo '<li><a href="marques.php?nom='.$categorie['cat_nom'].'">'.$categorie['cat_nom'].'</a></li>';
                        }
                        ?>


                    </ul>
                </li>
                <?php
                if(isset($_SESSION['cli'])){

                    $cli = Client::getUserWithSession($_SESSION['cli']);

                    ?>
                    <li class="dropdown"><a href="#"><span><?php echo $cli['cli_email'] ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="panier.php">Panier</a></li>
                            <li><a href="index.php?logout">Déconnexion</a></li>

                        </ul>
                    </li>
                    <?php
                }
                else{
                    echo '<li><a href="connexion.php">Connexion</a></li>';
                }
                ?>




            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Hero Section
============================-->
<section id="hero">
    <div class="hero-container">

        <h1     class="img-fluid animated fadeInDown">Tout les produits de la marque : <?php echo $_GET['nom']?></h1>

    </div>
</section><!-- #hero -->

<main id="main">


    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div id="new" class="container wow fadeInUp" style="margin-bottom: 50px">
            <div class="section-header">


            </div>
        </div>
        <div class="container wow fadeIn">

            <?php
            require_once('class/Produits.php');
            $allProduits = Produits::getAllProduitsWithMarque($_GET['nom']);
           if($allProduits == false){
               echo '<p> Aucun produit de cette marque</p>';
           }
            echo ' <div class="row">';
            $i = 2;
            foreach($allProduits as $produits){


                echo ' <a href="produit.php?code='.$produits['pro_code'].'"> <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.'.$i.'s">';
                echo ' <div style="height: auto;"class="box">';
                echo ' <div class="icon"><i class="fa fa-eye"></i></a></div>';
                echo ' <h4 class="title">'.$produits['pro_nom'].'</h4>';
                echo ' <h6 class="title">'.$produits['pro_prix'].'€</h6>';
                echo '<img  height="150"class="fit-picture"
     src="imgproduits/'.$produits['pro_photo1'].'.png"
    >';
                echo ' </div>';
                echo ' </div> </a>';
                $i++;
            }
            ?>







        </div>

        </div>
    </section><!-- #services -->


    <!--==========================
      Contact Section
    ============================-->




</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Projet</strong>.Tous droits réservés.
        </div>

    </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>
