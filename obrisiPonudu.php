<?php
include 'konekcija.php';

$ponudaID = $mysqli->real_escape_string(trim($_POST['ponuda']));

$upit = "DELETE FROM ponuda WHERE ponudaID = $ponudaID";
$rezultat = $mysqli->query($upit);

echo($rezultat);

 ?>