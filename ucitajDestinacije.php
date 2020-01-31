<?php

include "konekcija.php";

$upit = 'SELECT * FROM destinacija';
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows == 0) {
    echo "U bazi ne postoji nista";
} else {
    while ($row = $rezultat->fetch_object()) {
        ?> 
        <option value = "<?= $row->destinacijaID ?>" > <?= $row->grad ?> </option>
        <?php
    }
}          
$mysqli->close();
?>