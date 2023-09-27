<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
Produits::deleteProduitWithId($_GET['idpro']);
    ?>
    <script>
        document.location.href="product.php";
    </script>
    <?php
}
else{
    ?>
    <script>
        document.location.href="login.php";
    </script>
    <?php
}
?>