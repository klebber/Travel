<?php 
	require('init.php');   
	require('userClass.php');  
$user = new User($db);  
if(isset($_POST['ime']) && isset($_POST['email']) && isset($_POST['lozinka'])) {	
	
	$ime=trim($_POST['ime']);
	$email=trim($_POST['email']);
	$lozinka=trim($_POST['lozinka']);
	
	
	header("Location: login.php");
	if($user->registrovanjeKorisnika($ime,$email,$lozinka))
	{	
		header("Location: login.php");
	}
	else {
		$greska = "Nije moguce napraviti nalog sa zadatim podacima.";
		$_SESSION['greskaReg'] = $greska;
		header("Location: registracija.php");
	}
}
else {
	$greska = "Nastala je greska pri registraciji! Molimo pokusajte ponovo.";
	$_SESSION['greskaReg'] = $greska;
	header("Location: registracija.php");
}
?>