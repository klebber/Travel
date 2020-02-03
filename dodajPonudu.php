<?php
include 'konekcija.php';

$destinacijaID = $mysqli->real_escape_string(trim($_POST['destinacija']));
$cena = $mysqli->real_escape_string(trim($_POST['cena']));
$datumOD = $mysqli->real_escape_string(trim($_POST['datumod']));
$datumDO = $mysqli->real_escape_string(trim($_POST['datumdo']));

$upit = "INSERT INTO ponuda(cena, datumOD, datumDO, destinacijaID) VALUES ($cena, '$datumOD', '$datumDO', $destinacijaID)";
$rezultat = $mysqli->query($upit);

echo($rezultat);

 ?>
