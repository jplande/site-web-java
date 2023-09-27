<?php
session_start();
require_once('class/Client.php');
if(isset($_POST['createaccount'])){
    ?>
    <script>
        document.location.href="register.php";
    </script>
    <?php
}
if(isset($_POST['login'])){
    $conn = Client::verifLogin($_POST['email'],$_POST['pass']);
    var_dump($conn);
    if($conn == true){
        ?>
        <script>
            document.location.href="index.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('erreur de connexion');
        </script>
        <?php
    }
}
require_once('class/Categories.php');
require_once('class/Produits.php');
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

    <!-- Bootstrap CSS  -->
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
                <li class="dropdown"><a href="#"><span>Marques</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <?php
                        foreach($allCategories as $categorie){
                            echo '<li><a href="#">'.$categorie['cat_nom'].'</a></li>';
                        }
                        ?>


                    </ul>
                </li>
                <li class="menu-active"><a   href="connexion.php">Connexion</a></li>


            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Hero Section
============================-->
<section id="hero">
    <div class="hero-container">


        <div class="row" style="width: 80%;margin-left: 10% !important;">
            <form style="width: 100%;" class="user" action="connexion.php" method="post">
            <div class="col-lg-12 col-md-12 wow fadeInUp">
                <input type="email" name="email" class="form-control form-control-user"
                       id="exampleInputEmail" aria-describedby="emailHelp"
                       placeholder="Email">
            </div>
                <br>
            <div class="col-lg-12 col-md-12 wow fadeInUp">
                <input type="password" name="pass" class="form-control form-control-user"
                       id="exampleInputPassword" placeholder="Mot de passe">
            </div>
                <br>
            <div class="col-lg-12 col-md-12 img-fluid animated fadeInUp">
                <button type="submit" name="login" value="true" class="btn btn-primary btn-user btn-block">Login</button>
                <button type="submit" name="createaccount" value="true" class="btn btn-primary btn-user btn-block">Crée un compte</button>
            </div>
            </form>
                <div class="form-group">

                </div>
                <div class="form-group">

                </div>





                <hr>



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

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>
</html>
