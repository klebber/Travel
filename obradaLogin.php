<?php 
require("init.php");
require('userClass.php');  
$user = new User($db);  
if(isset($_POST['email']) && isset($_POST['lozinka']))
{
	$username = $_POST['email'];
	$password = $_POST['lozinka'];

	if($user->logovanjeKorisnika($username, $password))
	{	
		header("Location: index.php");
	}
	else {
		$greska = "Neispravni podaci.";
		$_SESSION['greskaLogin'] = $greska;
		header("Location: login.php");
	}
} 
else
{
	$greska = "Nastala je greska pri logovanju! Molimo pokusajte ponovo.";
	$_SESSION['greskaLogin'] = $greska;
	header("Location: login.php");
}
?>