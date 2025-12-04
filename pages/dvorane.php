<?php
require_once "../header.php";
require_once "../Models/dvorana.php";

$dvorane = Dvorana::Dvorane();
?>
<div id="content">
    <h2>Dvorane (MSSQL)</h2>
    <p class="uspjeh">
        <?php
        if(isset($_SESSION["poruka"])){
            echo $_SESSION["poruka"];
            unset($_SESSION["poruka"]);
        }
        ?>
    </p>
    <table border="1" cellpadding="6">
        <tr>
            <th>Dvorana</th>
            <th>Kapacitet</th>
        </tr>
        <?php foreach($dvorane as $d): ?>
        <tr>
            <td><?= $d["oznDvorana"]; ?></td>
            <td><?= $d["kapacitet"]; ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
require_once "../footer.php";
?>