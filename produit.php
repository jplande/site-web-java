<?php
session_start();
require_once('class/Client.php');
require_once('class/Categories.php');
require_once('class/Produits.php');
$allCategories = Categories::getAllCategories();
if(!isset($_GET['code'])){
    ?>
    <script>
        document.location.href="index.php";
    </script>
    <?php
}
$Produit = Produits::getProduitWithCode($_GET['code']);
if($Produit == false){
    ?>
    <script>
        document.location.href="index.php";
    </script>
    <?php
}
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

        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="index.php">Acceuil</a></li>
                <li class="dropdown"><a href="#"><span>Marques</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <?php
                        foreach($allCategories as $categorie){
                            echo '<li><a href="#">'.$categorie['cat_nom'].'</a></li>';
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

        <h1     class="img-fluid animated fadeInDown"><?php echo $Produit[0]['pro_nom']; ?></h1>
        <h2    class="img-fluid animated fadeInDown"><?php echo $Produit[0]['pro_prix'].'€'; ?></h2>
        <div class="row">
            <div class="col-lg-4 col-md-4 wow fadeInUp">
             <img  height="400"class="fit-picture"
                    src="imgproduits/<?php echo $Produit[0]['pro_photo1']?>.png">
            </div>
            <div class="col-lg-4 col-md-4 wow fadeInUp">
                <img  height="400"class="fit-picture"
                      src="imgproduits/<?php echo $Produit[0]['pro_photo2']?>.png">
            </div>
            <div class="col-lg-4 col-md-4 wow fadeInUp">
                <img  height="400"class="fit-picture"
                      src="imgproduits/<?php echo $Produit[0]['pro_photo3']?>.png">
            </div>

        <div class="col-lg-12 col-md-12 img-fluid animated fadeInUp">
            <a id="add" class="btn-get-started">Ajouter au painier</a>

        </div>
        </div>
    </div>
</section><!-- #hero -->

<main id="main">

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
            &copy; Copyright <strong>Clapz</strong>.Tous droits réservés.
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
<script>
    $( "#add" ).click(function() {
        $.post('addcard.php',
            {
                idcli: '<?php echo $cli['cli_id'] ?>',
                idpro: '<?php echo $Produit[0]['pro_id'] ?>'
            }, function(data) {
                <?php if(isset($_SESSION['cli'])){


                    echo "alert('ajouté au panier');";


            }


            else{

                echo "alert('Merci de vous connecter');";
            }?>

            });
    });
</script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>
