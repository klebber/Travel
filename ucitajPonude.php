<?php

include "konekcija.php";

$upit = 'SELECT * FROM destinacija d join ponuda p on d.destinacijaID = p.destinacijaID ORDER BY p.ponudaID';
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows == 0) {
    echo "U bazi ne postoji nista";
} else {
    while ($row = $rezultat->fetch_object()) {
        ?> 
        <option value = "<?= $row->ponudaID ?>" > <?= $row->grad ?>: <?= $row->datumOD ?> - <?= $row->datumDO ?> <?= $row->cena ?> </option>
        <?php
    }
}          
$mysqli->close();
?>