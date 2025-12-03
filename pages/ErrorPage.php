<?php
require "../header.php";
#require_once "../Models/Kategorija.php";
?>
<div id="content">
    <h1>ERROR PAGE</h1>
    <p class="greska">
        <?php
        echo isset($_SESSION["err"]) ? $_SESSION["err"] :"Nepoznata greška";
        unset($_SESSION["err"]);
        ?>
    </p>
</div>
<?php require "../footer.php"; ?>

