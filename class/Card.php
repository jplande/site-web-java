<?php
require_once('Database.php');
require_once('Client.php');
require_once('Produits.php');
class Card {


    public static function addToCard($iduti,$idpro){


            $conn = Database::Connexion();

            $rep =  Database::doRequest($conn,'INSERT INTO `panier`( `pan_cli_id`, `pan_pro_id`) VALUES (\''.$iduti.'\',\''.$idpro.'\')');

            return $rep;



    }
    public static function getAllProductFromCard($session){
        $user = Client::getUserWithSession($session);
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM panier WHERE pan_cli_id='.$user['cli_id']);

        $Products = array();
        if (mysqli_num_rows($allProduct) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allProduct)) {
             
                $produit  = Produits::getProduitWithid($row['pan_pro_id']);

                    array_push($produit,$row['pan_id']);
                array_push($Products,$produit);
            }
        } else {
            return false;
        }
       
        return $Products;
    }
    public static function delToCard($idcard){


        $conn = Database::Connexion();

        $rep =  Database::doRequest($conn,'DELETE FROM `panier`WHERE pan_id=\''.$idcard.'\'');


        return $rep;



    }
}
