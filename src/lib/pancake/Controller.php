<?php
require_once(getenv("DOCUMENT_ROOT")."/Database/database.php");
require_once(getenv("DOCUMENT_ROOT")."/moveit2/lib/autoload.php");
require_once('model.php');

class Controller {
    public $db;

    public static $table;
    public static $model;
    public static $application_name = "moveit";

    public static $databaseUser = "WEB_MOVEIT";

    function __construct() {
        $this->db = DB::connect(static::$databaseUser);
    }

    function index($orderBy="id ASC") {
        $query = "SELECT * FROM ".static::$table." ORDER BY $orderBy";
        $sth = $this->db->prepare($query);
        $sth->execute();

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $models[] = new static::$model($row['ID'],$row);
        }
        if(isset($models)) {
            return $models;
        }
        else return false;
    }

    function getBy($column,$value, $like=false, $order="ASC") {
        $value = strtolower($value);
        if($like) {
            $query = "SELECT * FROM ".static::$table. " WHERE lower($column) LIKE :value ORDER BY $column $order";
            $value = "%".$value."%";
        }
        else {
            $query = "SELECT * FROM ".static::$table. " WHERE lower($column)=:value ORDER BY id DESC";
        }
        $sth = $this->db->prepare($query);
        $sth->bindParam(":value",$value);
        $sth->execute();

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $models[] = new static::$model($row['ID'],$row);
        }
        if(isset($models)) {
            return $models;
        }
        else return false;
    }
    function countBy($column,$value, $like=false) {
        $value = strtolower($value);
        if($like) {
            $query = "SELECT COUNT(id) FROM ".static::$table. " WHERE lower($column) LIKE :value";
            $value = "%".$value."%";
        }
        else {
            $query = "SELECT COUNT(id) FROM ".static::$table. " WHERE $column=:value";
        }
        $sth = $this->db->prepare($query);
        $sth->bindParam(":value",$value);
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) {
            return $row['COUNT(ID)'];
        }
        else return 0;
    }

    /**
     * Filter models by clauses
     * @param Mixed $clauses - Array or Arrays specifying the filter clauses
     * $clause['column'],$clause['value'],$clause['comparator'],$clause['prepend'] must be
     * used as array indicies
     * @returns Array of Models if any match, or false if none
     */
    function filter ($clauses,$suffix=null) {
        $query = "SELECT * FROM ".static::$table." WHERE ";
        //If its multiple clauses, go through each
        if(isset($clauses[0])) {
            $i=1;
            foreach($clauses as $c) {
                if(!empty($c['prepend'])) {
                    $query .= " " .$c['prepend']." ";
                }
                $query .= $c['column']." ".$c['comparator']." :".$i;
                $i++;
            }
        }
        //Otherwise it is a 1D array, with 1 clause
        else {
            if(!empty($clauses['prepend'])) {
                $query .= " " .$c['prepend']." ";
            }
            $query .= $clauses['column']." ".$clauses['comparator']." :".$clauses['column'];
        }
        if($suffix!=null) {
            $query .= " $suffix";
        }
        $sth = $this->db->prepare($query);
        if(isset($clauses[0])) {
            $i=1;
            foreach($clauses as $c) {
                $sth->bindParam(":".$i,$c['value']);
                $i++;
            }
        }
        else {
            $sth->bindParam(":".$clauses['column'],$clauses['value']);
        }
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $models[] = new static::$model($row['ID'],$row);
        }
        if(isset($models)) {
            return $models;
        }
        else return false;
    }
}