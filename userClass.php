<?php 
require("init.php");
class User {

	
	private $poruka='';
	private $db;

	public function __construct($db) {
		$this->db = $db;   
	}

	
	public static function logovanjeKorisnika($username, $password){
	
			 $parameters = '[{'.

			'"username"'.':'.'"'.$username.'",'.
			'"password"'.':'.'"'.$password.'"'
 
			.'}]';

			$curl_zahtev = curl_init("http://localhost/travel/restfullApi/login.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			if(!isset($json_objekat['greska'])){
				$json_objekat['greska']='';
			}
			if($json_objekat['greska'] == "Nema rezultata.") {
				return false;
			}
			else {
				$_SESSION['ulogovan'] = 1;
				$_SESSION['ime'] =$json_objekat['ime'];
				$_SESSION['id'] =$json_objekat['id'];
				$_SESSION['rola'] =$json_objekat['rola'];
			return true;
			}  
}
	
	
		public static function registrovanjeKorisnika($ime, $email, $lozinka){
			 $parameters = '[{'.

			'"ime"'.':'.'"'.$ime.'",'.
			'"email"'.':'.'"'.$email.'",'.
			'"lozinka"'.':'.'"'.$lozinka.'",'.
			'"rola"'.':'.'"korisnik"'

			.'}]';

			$curl_zahtev = curl_init("http://localhost/travel/restfullApi/korisnici.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			
			if($json_objekat== "Registracija nije uspela!") {
				return false;		
			}
			else {
				return true;
			}  

}
	
	public function logout() {  
		$_SESSION['ulogovan'] = 0;
		$_SESSION['ime'] = '';
		$_SESSION['id'] =0;		
	}
	
	public function is_logged_in() {  
		return $_SESSION['ulogovan'];
	}
	public function get_message() {
		return $this->poruka;
	}
	
	public function set_message($message,$type) {
		$this->poruka['msg'] = $message;
		$this->poruka['type'] = $type;
	}

}
?>
