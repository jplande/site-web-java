<?php

require_once('../class/Admin.php');
require_once('../class/Categories.php');
require_once('../class/Produits.php');
session_start();
if(isset($_GET["logout"])){
    unset($_SESSION["admin"]);
}
if(isset($_SESSION["admin"])){

    $result = Admin::getAdminWhithSession($_SESSION["admin"]);
    if($result == false){
        ?>
        <script>
            document.location.href="login.php";
        </script>
        <?php
    }


}
else{
    ?>
    <script>
        document.location.href="login.php";
    </script>
    <?php
}
if(isset($_POST['add'])){
    $target_dir = "../imgproduits/";
    $uuid1 = Database::genUUID();

    $target_file = $target_dir . $uuid1['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["photo1"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file)) {


        } else {

        }
    }

    $uuid2 = Database::genUUID();

    $target_file = $target_dir . $uuid2['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["photo2"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $target_file)) {


        } else {

        }
    }

    $uuid3 = Database::genUUID();

    $target_file = $target_dir . $uuid3['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["photo3"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo3"]["tmp_name"], $target_file)) {
           

        } else {

        }
    }


    Produits::AddProduct($_POST['nom'],$_POST['quantite'],$_POST['prix'],$_POST['marque'],$uuid1,$uuid2,$uuid3);

}

if(isset($_POST['mod'])){
    $target_dir = "../imgproduits/";
    $uuid1 = Database::genUUID();

    $target_file = $target_dir . $uuid1['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["mod"])) {
        $check = getimagesize($_FILES["photo1"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file)) {


        } else {
            $uuid1['UUID()']=null;
        }
    }

    $uuid2 = Database::genUUID();

    $target_file = $target_dir . $uuid2['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["mod"])) {

        $check = getimagesize($_FILES["photo2"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $target_file)) {


        } else {

            $uuid2['UUID()']=null;
        }
    }

    $uuid3 = Database::genUUID();

    $target_file = $target_dir . $uuid3['UUID()'].'.png';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est une image réelle ou une fausse image
    if(isset($_POST["mod"])) {
        $check = getimagesize($_FILES["photo3"]["tmp_name"]);
        if (move_uploaded_file($_FILES["photo3"]["tmp_name"], $target_file)) {


        } else {
            $uuid3['UUID()']=null;
        }
    }

    Produits::modProduct($_POST['proid'],$_POST['nom'],$_POST['quantite'],$_POST['prix'],$_POST['marque'],$uuid1,$uuid2,$uuid3);

}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper (emballage) -->
<div id="wrapper">

    <!-- Sidebar (barre lateral) -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard  (tableau de bord)-->
        <li class="nav-item ">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Statistiques</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestion
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="product.php">
                <i class="fas fa-fw fa-archive"></i>
                <span>Produits</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="categorie.php">
                <i class="fas fa-fw fa-store"></i>
                <span>Catégories</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="clients.php">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Clients</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link" href="employe.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Employés</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler(bascul) (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- Fin du Sidebar -->

    <!-- Contenu Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Contenu -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle(basculer) (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">




                        <!-- Nav Item - Information Utilisateur -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $result['adm_email']?></span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - Information Utilisateur -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?logout=true"  >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Déconnexion
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- Fin du Topbar -->

                <!-- BDebut Page Contenu -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admin Produits</h6>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php">
                                <i class="fas fa-fw fa-plus"></i>
                                <span>Ajouter</span></a>
                        </li>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $produits = Produits::getAllProduits();

                                    foreach($produits as $produit){
                                        $cat = Categories::getCategoriesWithId($produit['pro_cat_id']);

                                       echo ' <tr>';
                                       echo '     <td>'.$produit['pro_nom'].'</td>';
                                       echo '     <td>'.$produit['pro_quantite'].'</td>';
                                       echo '     <td>'.$produit['pro_prix'].'</td>';
                                        echo '     <td>'.$cat[0]['cat_nom'].'</td>';
                                        echo '     <td> <a class="nav-link" href="modifierproduct.php?idpro='.$produit['pro_id'].'"><i class="fas fa-fw fa-pen"></i></a></td>';
                                        echo '     <td> <a class="nav-link" href="deleteproduct.php?idpro='.$produit['pro_id'].'"><i class="fas fa-fw fa-trash"></i></a></td>';
                                       echo ' </tr>';

                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Fin Main Contenu -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; siteWeb 2021</span>
                    </div>
                </div>
            </footer>
            <!-- Fin du Footer -->

        </div>
        <!-- Fin Contenu Wrapper -->

    </div>
    <!-- Fin Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quité?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout"  si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="js/demo/datatables-demo.js"></script>

</body>

</html>