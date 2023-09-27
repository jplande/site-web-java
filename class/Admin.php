<?php
require_once('Database.php');
class Admin{

    public static function verifLogin($email,$pass){
        $conn = Database::Connexion();
        $pass = hash('sha256', $pass);

        $Verif =  Database::doRequest($conn,'SELECT * FROM admin WHERE adm_email=\''.$email.'\' AND adm_password=\''.$pass.'\'');
        if (mysqli_num_rows($Verif) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($Verif)) {

                session_start();
                $_SESSION["admin"]=$row['adm_sess'];
                return true;
            }
        } else {
           return false;
        }

    }
    public static function getAdminWhithSession($session){
        $conn = Database::Connexion();
        $Verif =  Database::doRequest($conn,'SELECT * FROM admin WHERE adm_sess=\''.$session.'\'');

        if (mysqli_num_rows($Verif) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($Verif)) {


               return $row;
               
            }
        } else {
            return false;
        }
    }


    public static function getAllAdmin(){
       $conn = Database::Connexion();
        $allAdmin =  Database::doRequest($conn,'SELECT * FROM admin');
        $retour = array();
        if (mysqli_num_rows($allAdmin) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allAdmin)) {
                array_push($retour,$row);
            }
        } else {
            return false;
        }
        return $retour;
    }
    public static function AddAdmin($nom,$pass){
        $conn = Database::Connexion();
        $pass = hash('sha256', $pass);

        $rep =  Database::doRequest($conn,'INSERT INTO `admin`( `adm_email`, `adm_password`, `adm_sess`) 
VALUES (\''.$nom.'\',
\''.$pass.'\',
\''.$pass.'\')');

        return $rep;
    }
    public static function deleteAdminWithId($id){
        $conn = Database::Connexion();
        $retour =  Database::doRequest($conn,'DELETE FROM `admin`
    WHERE adm_id=\''.$id.'\' ');

        return $retour;
    }
}