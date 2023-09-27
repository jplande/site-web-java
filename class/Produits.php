<?php
require_once('Database.php');
class Produits {
    public $pro_id;
    public $pro_nom;
    public $pro_photo1;
    public $pro_photo2;
    public $pro_photo3;
    public $pro_quantite;
    public $pro_prix;
    public $pro_code;
    public $pro_cat_id;
    public $pro_status;



   public static function getAllProduits() {
       $conn = Database::Connexion();
       $allProduct =  Database::doRequest($conn,'SELECT * FROM produits');
       $Products = array();
       if (mysqli_num_rows($allProduct) > 0) {
           // output data pour chaque ligne
           while($row = mysqli_fetch_assoc($allProduct)) {
              array_push($Products,$row);
           }
       } else {
          return false;
       }
        return $Products;
    }
    public static function getAllRecentProduits() {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM produits ORDER BY pro_datecrea DESC ');
        $Products = array();
        if (mysqli_num_rows($allProduct) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allProduct)) {
                array_push($Products,$row);
            }
        } else {
            return false;
        }
        return $Products;
    }
    public static function getAllProduitsWithMarque($marque) {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'
SELECT * FROM produits
JOIN categories ON  categories.cat_id=produits.pro_cat_id
WHERE categories.cat_nom = \''.$marque.'\' ');
        $Products = array();
        if (mysqli_num_rows($allProduct) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allProduct)) {
                array_push($Products,$row);
            }
        } else {
            return false;
        }
        return $Products;
    }
    public static function getProduitWithCode($code) {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM produits WHERE pro_code=\''.$code.'\' ');
        $Products = array();
        if (mysqli_num_rows($allProduct) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allProduct)) {
                array_push($Products,$row);
            }
        } else {
            return false;
        }
        return $Products;
    }
    public static function getProduitWithid($id) {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM produits WHERE pro_id=\''.$id.'\' ');
        $Products = array();
        if (mysqli_num_rows($allProduct) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allProduct)) {
                array_push($Products,$row);
            }
        } else {
            return false;
        }
        return $Products;
    }
    public static function AddProduct($nom,$quantite,$prix,$idcategorie,$nomphoto1,$nomphoto2,$nomphoto3) {
        $conn = Database::Connexion();
        $code = Database::genUUID();

        $rep =  Database::doRequest($conn,'INSERT INTO `produits`( `pro_nom`, `pro_photo1`, `pro_photo2`, `pro_photo3`, `pro_quantite`, `pro_prix`, `pro_code`, `pro_cat_id`) 
VALUES (\''.$nom.'\',
\''.$nomphoto1['UUID()'].'\',
\''.$nomphoto2['UUID()'].'\',
\''.$nomphoto3['UUID()'].'\',
\''.$quantite.'\',\''.$prix.'\',
\''.$code['UUID()'].'\',
\''.$idcategorie.'\')');

        return $rep;
    }


    public static function modProduct($id,$nom,$quantite,$prix,$idcategorie,$nomphoto1,$nomphoto2,$nomphoto3) {
        $conn = Database::Connexion();
        $code = Database::genUUID();

        $req = 'UPDATE produits
SET pro_nom = \''.$nom.'\',pro_quantite = \''.$quantite.'\',pro_prix = \''.$prix.'\',';

        if($nomphoto1["UUID()"]!=null){

    
$req.= 'pro_photo1 = \''.$nomphoto1['UUID()'].'\',';
        }
        if($nomphoto2["UUID()"]!=null){

            $req.= 'pro_photo2 = \''.$nomphoto2['UUID()'].'\',';
        }
        if($nomphoto3["UUID()"]!=null){
            $req.= 'pro_photo3 = \''.$nomphoto3['UUID()'].'\',';
        }


        $req .='pro_cat_id = \''.$idcategorie.'\' WHERE pro_id=\''.$id.'\'';

        $rep =  Database::doRequest($conn,$req);

        return $rep;
    }


    public static function deleteProduitWithId($id) {
        $conn = Database::Connexion();
        $retour =  Database::doRequest($conn,'DELETE FROM `produits`
WHERE pro_id=\''.$id.'\' ');

        return $retour;
    }
}

?> 