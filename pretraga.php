<?php

if (!isset($_GET['id']))
    echo "Parametar id nije prosleđen!";

$grad = $_GET['id'];
$order = $_GET['order'];
include "konekcija.php";

$upit = "SELECT d.grad as grad, p.cena as cena, p.datumOD as datumOD, p.datumDO as datumDO FROM ponuda p JOIN destinacija d on d.destinacijaID = p.destinacijaID WHERE d.grad = '$grad'" . $order;

$rezultat = $mysqli->query($upit);

if ($rezultat->num_rows == 0) {
    echo "U bazi ne postoji ponuda za destinaciju: " . $grad;
} else {
    while ($red = $rezultat->fetch_object()) {
        ?>
        <tr>
            <td><?= $red->grad; ?></td>
            <td><?= $red->datumOD; ?></td>
            <td><?= $red->datumDO; ?></td>
            <td><?= $red->cena; ?></td>
        </tr>
        <?php
    }
}
$mysqli->close();


?>