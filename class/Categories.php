<?php
require_once('Database.php');
class Categories {


    public static function getAllCategories() {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM categories');
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
    public static function getCategoriesWithId($id) {
        $conn = Database::Connexion();
        $allProduct =  Database::doRequest($conn,'SELECT * FROM categories WHERE cat_id=\''.$id.'\'');
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
    public static function deleteCategorieWithId($id){
        $conn = Database::Connexion();
        $retour =  Database::doRequest($conn,'DELETE FROM `categories`
    WHERE cat_id=\''.$id.'\' ');

        return $retour;

    }
    public static function modCat($nom,$id){
        $conn = Database::Connexion();
        $code = Database::genUUID();

        $req = 'UPDATE categories
SET cat_nom = \''.$nom.'\'';



        $req .=' WHERE cat_id=\''.$id.'\'';



        $rep =  Database::doRequest($conn,$req);

        return $rep;
    }
    public static function AddCategories($nom){
        $conn = Database::Connexion();
        $code = Database::genUUID();

        $rep =  Database::doRequest($conn,'INSERT INTO `categories`(`cat_nom`) 
VALUES (\''.$nom.'\')');

        return $rep;
        
    }


}