<?php


class Conexao{

    public static function LigarConexao() {

        $conn = new PDO('mysql:dbname=adegairmandade;host=localhost', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;



        

    }



}

/* $conn = new PDO('mysql:dbname=u283879542_adegairmandade;host=195.179.239.0', 'u283879542_adegairmandade', '');
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;
  */
        