<?php 
require_once RootDir.'/config/Dbconfig.php';

/**
* To connect with database
*/
class DbConn
{
	public $conn;
	function __construct()
	{
		$Dbconfig = new Dbconfig();
		$this->conn = mysqli_connect($Dbconfig->serverName, $Dbconfig->userName, $Dbconfig->passCode, $Dbconfig->dbName);
		if (!$this->conn) die('Could not connect: ' . mysql_error());
	}
}