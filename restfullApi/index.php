<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){
	
	die();
});

Flight::register('db', 'Database', array('niz'));


Flight::route('POST /login.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->uloguj($json_data);
	if (!$db->getResult()) {
		echo '{"greska":"Nastala je greska pri izvrsavanju upita."}';
		exit();
	} else {
		if ($db->getResult()->num_rows>0) {
			echo indent(json_encode($db->getResult()->fetch_object()));
		} else {
			echo '{"greska":"Nema rezultata."}';
		}
	}		
});

Flight::route('POST /korisnici.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);	
	$db->registracijaKorisnika($json_data);
	if($db->getResult()) {
		$response = "Uspesno ste registrovani.";
	} else {
		$response = "Registracija nije uspela!";
	}
	echo indent(json_encode($response));
});

Flight::route('POST /rezervisi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);	
	$db->rezervacija($json_data);
	if($db->getResult()) {
		$response = "Uspesno ste izvrsili rezervaciju.";
	}
	else {
		$response = "Ponuda vec rezervisana!";
	}
	echo indent(json_encode($response));
});

Flight::route('POST /ponisti.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);	
	$db->ponistiRezervaciju($json_data);
	if($db->getResult()) {
		$response = "Uspesno ste ponistili rezervaciju.";
	}
	else {
		$response = "Doslo je do greske prilikom ponistavanja rezervacije!";
	}
	echo indent(json_encode($response));
});

Flight::start();
?>
