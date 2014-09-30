<?php
class DB extends PDO{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct() {
        $this->engine = "oci";
        $this->host = "apptestdb.emich.edu";
        $this->user = "ldenison";
        $this->database = "APPTEST";
        $this->pass = "h4v3c0k3wb0rt";
        $dns = "oci:dbname=(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = apptestdb.emich.edu)(PORT = 1521)))(CONNECT_DATA=(SID=APPTEST)))";
        parent::__construct($dns,$this->user,$this->pass);
    }
}
