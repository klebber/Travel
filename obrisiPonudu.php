<?php
include 'konekcija.php';

$ponudaID = trim($_POST['ponuda']);

$upit = "DELETE FROM ponuda WHERE ponudaID = $ponudaID";
$rezultat = $mysqli->query($upit);

echo($rezultat);

 ?>