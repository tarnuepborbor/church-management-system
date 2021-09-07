<?php 

Class Dbh {

	private $servername;
	private $username;
	private $password;
	private $myDb;
	private $charset;


	public function connection(){
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->myDb = "church_db";

		try {
			    $dsn = "mysql:host=".$this->servername.";dbname=".$this->myDb;
			    $pdo =  new PDO($dsn, $this->username, $this->password);

			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $pdo;
			    
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }
	}


}


