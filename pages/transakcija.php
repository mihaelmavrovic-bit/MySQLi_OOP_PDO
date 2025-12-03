<?php

require "../header.php";
require_once "../Models/Kategorija.php";
require_once "../Models/Produkt.php";
require_once "../DB/DB.php";

    $db = DB::getInstance()->connpdo;
    $kategorije = Kategorija::allCategories();

?>
<div id="content">
    <h2>Dodavanje kategorije i prozitvoda transakcija</h2>

    <form method = "POST" action="">
        <label>Naziv kategorije</label>
        <select name="kategorijaid" id="kategorijaid" onchange = "change(this.value)">
            <option value="-1">--Odaberi--</option>
            <?php foreach($kategorije as $k): ?>
                <option value="<?= $k["id"] ?>"><?= $k["naziv"] ?></option>
                <?php endforeach;?>
                <option value="new">+Nova kategorija</option>
        </select>
        <div id="nova_kategorija_wrap" style="display:none; margin-top: 10px;">
        <label>Naziv kategorije</label>
        <input type="text" name="kategorija">
        </div> 
        <label>Naziv proizvoda</label>
        <input type="text" name="naziv">
        <label>Količina</label>
        <input type="text" name="kolicina">
        <label>Cijena</label>
        <input type="text" step="0.01" name="cijena">
        <button type="submit">Spremi transakciju</button>
    </form>
    <?php
    if($_POST){
        $kategorijaid = $_POST["kategorijaid"];        
        $nazivPro = $_POST["naziv"];
        $kolicina = $_POST["kolicina"];
        $cijena = $_POST["cijena"];
    

    try{
        $db->beginTransaction();
        if($kategorijaid ==="new"){
            $newCatId = Kategorija::insertForTransaction($nazivKat,$db);
            $nazivKat = $_POST["kategorija"];

        }
        else{
            $newCatId = int($kategorijaid);
        }

        

        $ok = Product::insertForTransaction($nazivPro,$kolicina,$cijena,$newCatId,$db);
        if(!$ok){
            throw new Exception("Neuspješan unos proizvoda");
        }
        $db->commit();
        $_SESSION["poruka"] = "Transakcija  uspješno unešena";
        header("Location: proizvodi.php");
    }
    catch(Exception $e){
        $db->rollBack();
        Redirect::redirectToErrorPage($e->getMessage());
        exit;
    }
}
 ?>
</div>
<?php
require_once "../footer.php";

?>

<script>
    function change(izbor){
        let wrap = document.getElementbyID("nova_kategorija_wrap");

        if(izbor==="new"){
            wrap.style.display="block";
        }
        else{
            wrap.stype.display="none";
        }
    }
    </script>