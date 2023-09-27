<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../class/Admin.php');
require_once('../class/Categories.php');
require_once('../class/Client.php');
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
    Client::deleteClientWithId($_GET['idcli']);
    ?>
    <script>
        document.location.href="clients.php";
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