<?php
namespace dbconnection{

    use PDO;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class connDatabase
{

    public $dbinfo;
    public $userinfo;
    public $pass;
    public $dbconn;
    public function __construct($ginfo, $guserinfo, $gpass)
    {
        $this->dbinfo = $ginfo;
        $this->userinfo = $guserinfo;
        $this->pass = $gpass;
    }
    public function connect(){
        $this->dbconn=new PDO($this->dbinfo, $this->userinfo, $this->pass);
     
        
        return $this->dbconn;

    }
}


}