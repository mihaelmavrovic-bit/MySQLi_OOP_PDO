<?php
session_start();
require_once "../Models/Produkt.php";

if(isset($GET['id'])){
    die("Nedostaje ID Proizvoda!");
}

Product::delete($_GET['id']);

header("Location: proizvodi.php");

?>