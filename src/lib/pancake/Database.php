<?php
class Database extends PDO{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct() {
        $this->engine = "mysql";
        $this->host = "MemoryRSS.db.9498559.hostedresource.com";
        $this->user = "MemoryRSS";
        $this->database = "MemoryRSS";
        $this->pass = "nqi!%xcuYHL89layu";
        $dns = $this->engine.":dbname=".$this->database.";host=".$this->host;
        parent::__construct($dns,$this->user,$this->pass);
    }
}
