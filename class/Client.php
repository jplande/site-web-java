<?php
require_once('Database.php');
class Client {

    public static function createClient($email,$pass,$telephone){

        $conn = Database::Connexion();
        $pass = hash('sha256', $pass);
        $rep =  Database::doRequest($conn,'INSERT INTO `client`( `cli_email`, `cli_password`, `cli_numberphone`) VALUES (\''.$email.'\',\''.$pass.'\',\''.$telephone.'\')');
        $_SESSION["cli"]=$pass;
        return $rep;
    }
    public static function verifLogin($email,$pass){

        $conn = Database::Connexion();
        $pass = hash('sha256', $pass);
        $Verif =  Database::doRequest($conn,'SELECT * FROM client WHERE cli_email=\''.$email.'\' AND cli_password=\''.$pass.'\'');
        if (mysqli_num_rows($Verif) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($Verif)) {
                session_start();
                $_SESSION["cli"]=$row['cli_password'];
                return true;
            }
        } else {
            return false;
        }
    }
        public static function getUserWithSession($sess){

            $conn = Database::Connexion();


            $Verif =  Database::doRequest($conn,'SELECT * FROM client WHERE cli_password=\''.$sess.'\'');
            if (mysqli_num_rows($Verif) > 0) {
                // output data pour chaque ligne
                while($row = mysqli_fetch_assoc($Verif)) {

               return $row;

                }
            } else {
                return false;
            }

    }
    public static function getAllUser(){
        $conn = Database::Connexion();
        $allClient =  Database::doRequest($conn,'SELECT * FROM client');
        $clients = array();
        if (mysqli_num_rows($allClient) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($allClient)) {
                array_push($clients,$row);
            }
        } else {
            return false;
        }

        return $clients;

    }
    public static function deleteClientWithId($id){
        $conn = Database::Connexion();
        $retour =  Database::doRequest($conn,'DELETE FROM `client`
    WHERE cli_id=\''.$id.'\' ');

        return $retour;

    }




}