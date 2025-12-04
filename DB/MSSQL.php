<?php

class MSSQL{
    private static ?MSSQL $instance = null;

    public ?PDO $connsql;

    private function __construct(){

        $dsn = "sqlsrv:Server=DESKTOP-NAQM2HS\\SQLEXPRESS;Database=Fakultet";
        $user="eduka_user";
        $pass="Lozinka123!";

        try{
            $this->connsql = new PDO($dsn,$user,$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
           // echo "<br>Konekcija uspješna!";
        }
        catch(PDOException $e)
        {
            die("Greška s bazom: ".$e->getMessage());
        }
    }

    public static function getInstance(): MSSQL{
        return self::$instance ??= new MSSQL();
    }

    public function __destruct(){
        if($this->connsql){
            $this->connsql = null;
        }
    }

    
} 
   // $db = MSSQL::getInstance()->connsql; //provjera konekcije baze

?>