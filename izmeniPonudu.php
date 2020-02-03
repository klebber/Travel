<?php
include 'konekcija.php';

$ponudaID = $mysqli->real_escape_string(trim($_POST['ponuda']));
$cena = $mysqli->real_escape_string(trim($_POST['cena']));

$upit = "UPDATE ponuda SET cena = $cena WHERE ponudaID = $ponudaID";
$rezultat = $mysqli->query($upit);

echo($rezultat);
 ?>
