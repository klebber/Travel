<?php
include 'konekcija.php';

$destinacijaID = trim($_POST['destinacija']);
$cena = trim($_POST['cena']);
$datumOD = trim($_POST['datumod']);
$datumDO = trim($_POST['datumdo']);

$upit = "INSERT INTO ponuda(cena, datumOD, datumDO, destinacijaID) VALUES ($cena, '$datumOD', '$datumDO', $destinacijaID)";
$rezultat = $mysqli->query($upit);

echo($rezultat);

 ?>
