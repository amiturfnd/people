<?php 

/**
* -------- This file Contains MySQL server details ---------
*/
class Dbconfig {
    public $serverName;
    public $userName;
    public $passCode;
    public $dbName;

    function __construct() {
        $this->serverName = 'localhost';
        $this->userName = 'root';
        $this->passCode = '';
        $this->dbName = 'people';
    }
}