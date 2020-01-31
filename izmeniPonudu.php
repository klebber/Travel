<?php
include 'konekcija.php';

$ponudaID = trim($_POST['ponuda']);
$cena = trim($_POST['cena']);

$upit = "UPDATE ponuda SET cena = $cena WHERE ponudaID = $ponudaID";
$rezultat = $mysqli->query($upit);

echo($rezultat);
 ?>
