<?php 
require("init.php");
if($_SESSION['ulogovan'] == 0 || $_SESSION['rola'] != 'korisnik') {
    header("Location: index.php");
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    
	
    $parameters = '[{'.

    '"ponuda"'.':'.'"'.$id.'",'.
    '"korisnik"'.':'.'"'.$_SESSION["id"].'"'

    .'}]';

    $curl_zahtev = curl_init("http://localhost/travel/restfullApi/rezervisi.json");
    curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
    curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
    $curl_odgovor = curl_exec($curl_zahtev);
    $json_objekat=json_decode($curl_odgovor, true);
    curl_close($curl_zahtev);
    if($json_objekat == "Ponuda vec rezervisana!") {
        $_SESSION['greskaDest'] = "Vec ste rezervisali izabranu ponudu!";
        header("Location: destinacije.php");
    } else {
        $_SESSION['infoRez'] = $json_objekat;
		header("Location: rezervacije.php");
    }
} 
else
{
	header("Location: index.php");
}

?>