<?php 

/**
* -------- This file Contains MySQL server details ---------
*/
class Dbconfig {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;

    function __construct() {
        $this->serverName = 'localhost';
        $this->userName = 'root';
        $this->passCode = '';
        $this->dbName = '';
    }
}