<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "travel";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;
 

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
	
	function uloguj($podaci) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		$sql="SELECT * FROM korisnik u WHERE u.email = '" .$podaci[0]['username'] . "' AND u.lozinka = '".$podaci[0]['password']. "'";
		$this->result = $mysqli->query($sql);
		$mysqli->close();
	}

	function registracijaKorisnika($data) {
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		$cols = '(ime, email, lozinka,rola)';
		
		$values = "('".$data[0]['ime']."','".$data[0]['email']."','".$data[0]['lozinka']."','".$data[0]['rola']."')";
		
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
	
	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected = $this->dblink->affected_rows;
					return true;
		}	
		else{
			return false;
		}
	}
}
?>