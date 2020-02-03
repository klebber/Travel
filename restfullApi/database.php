<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "travel";
	private $dblink;
	private $result = true;
 

	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}
	
	public function getResult()
	{
		return $this->result;
	}
	
	function __destruct()
	{
		$this->dblink->close();
	}

	
	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $this->dblink->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}
	
	function rezervacija($data) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		$cols = '(ponudaID, korisnikID)';
		$ponuda = $mysqli->real_escape_string($data[0]['ponuda']);
		$korisnik = $mysqli->real_escape_string($data[0]['korisnik']);
		$values = "(".$ponuda.",".$korisnik.")";
		
		$query = 'INSERT into rezervacija '.$cols. ' VALUES '.$values;
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}

	function ponistiRezervaciju($data) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		
		$rezervacija = $mysqli->real_escape_string($data[0]['rezervacija']);
		$query = 'DELETE from rezervacija WHERE rezervacijaID = '.$rezervacija;
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}

	function uloguj($data) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		$username = $mysqli->real_escape_string($data[0]['username']);
		$password = $mysqli->real_escape_string($data[0]['password']);
		$sql="SELECT * FROM korisnik u WHERE u.email = '" .$username . "' AND u.lozinka = '".$password. "'";
		$this->result = $mysqli->query($sql);
		$mysqli->close();
	}

	function registracijaKorisnika($data) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		$cols = '(ime, email, lozinka,rola)';
		
		$ime = $mysqli->real_escape_string($data[0]['ime']);
		$email = $mysqli->real_escape_string($data[0]['email']);
		$lozinka = $mysqli->real_escape_string($data[0]['lozinka']);
		$rola = $mysqli->real_escape_string($data[0]['email']);
		$values = "('".$ime."','".$email."','".$lozinka."','".$rola."')";
		
		$query = 'INSERT into korisnik '.$cols. ' VALUES '.$values;
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	
	
}
?>