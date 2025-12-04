<?php
require_once __DIR__.'..\..\DB\MSSQL.php';
require_once __DIR__.'..\..\DB\DB.php';
class Dvorana{

    public static function Dvorane(): array{
        $db = MSSQL::getInstance()->connsql;
        $sql = "SELECT * FROM dbo.dvorana";
        $result = $db->query($sql);

        return $result->fetchAll();
    }
}

 /*public static function Tecajevi(): array{
        $db = DB::getInstance()->connpdo;
        $sql = "SELECT * FROM kategorije";
        $result = $db->query($sql);

        return $result->fetchAll();
    }*/

?>