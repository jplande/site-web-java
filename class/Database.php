<?php

class Database
{


    public static function Connexion()
    {
        $ip = '127.0.0.1';
        $user = 'root';
        $pass = '';
        $database = 'styleshoes';

// Creer connexion
        $conn = new mysqli($ip, $user, $pass, $database);

// verif connexion
        if ($conn->connect_error) {
            return false;
        }
        return $conn;

    }

    public static function doRequest($conn, $req)
    {
        $result = mysqli_query($conn, $req);
        mysqli_close($conn);
        return $result;
    }
    public static function genUUID(){
        $conn = Database::Connexion();
        $uuid =  Database::doRequest($conn,'SELECT UUID()');

        if (mysqli_num_rows($uuid) > 0) {
            // output data pour chaque ligne
            while($row = mysqli_fetch_assoc($uuid)) {
                return $row;
            }
        } else {
            return false;
        }

    }
}

?>