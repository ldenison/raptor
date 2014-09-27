<?php
require_once("/home/apache2/htdocs/Database/database.php");
require_once("/home/apache2/htdocs/moveit2/lib/autoload.php");

class Model {
    public $db;

    protected $id;
    protected $valid;		//Indicates if the object from database is valid
    public static $table;
    public static $databaseUser = "ldenison";

    protected $columns;		//Array of all columns of the object
    protected $data;		//Actual data with column name as index
    protected $changed;		//Indicates if a variable has been changed and needs to be saved

    public $hasOne;
    public $hasMany;
    public $belongsTo;
    public $hasAndBelongsToMany;

    /**
     *
     * @param Int $id - pass in a 0 if it is a new object not yet in the Database
     * @param Array $data - optional, include array of data if it is a new object ($id=0)
     */
    function __construct($id,$data=null) {
        $this->valid = true;
        $this->db = DB::connect(static::$databaseUser);

        if($id==0) {
            $this->describeColumnsFromDB();
            if($data!=null) {
                foreach(array_keys($data) as $k) {
                    //check in columns
                    $key = strtoupper($k);
                    $this->data[$key] = $data[$k];
                    $this->changed[] = $key;
                }
            }
        }
        elseif($id!=0 && $data==null) {
            $this->describeColumnsFromDB();

            $query = "SELECT * FROM ".static::$table." WHERE id=:id";
            $this->id = $id;
            $sth = $this->db->prepare($query);
            $sth->bindParam(":id",$this->id,PDO::PARAM_INT);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if(!empty($row)) {
                foreach(array_keys($row) as $key) {
                    $this->data[$key] = $row[$key];
                }
            }
            else {
                $this->valid = false;
                return false;
            }
        }
        elseif($id!=0 && $data!=null) {
            $this->id = $id;
            foreach(array_keys($data) as $key) {
                $this->columns[] = strtoupper($key);
                $this->data[strtoupper($key)] = $data[$key];

            }
        }
    }

    function save($debug=false) {
        //Make sure there is data to be saved
        if(isset($this->changed)) {
            //If id is 0, it is a brand new model, perform INSERT
            if($this->id==0) {
                $query = "INSERT INTO ".static::$table."(";
                foreach($this->changed as $c) {
                    if(in_array(strtoupper($c),$this->columns)) {
                        $query.= "$c,";
                    }
                    else {
                        throw new Exception("$c is not a column");
                    }
                }
                $query = substr_replace($query ,"",-1);
                $query.= ") VALUES (";
                foreach($this->changed as $c) {
                    $query .= ":$c,";
                }
                $query = substr_replace($query ,"",-1);
                $query .= ")";

                $sth = $this->db->prepare($query);
                foreach($this->changed as $c) {
                    $sth->bindParam(":$c",$this->data[$c]);
                }
                if($sth->execute()) {
                    unset($this->changed);
                    $query = "SELECT MAX(id) FROM ".static::$table;
                    $sth = $this->db->prepare($query);
                    $sth->execute();
                    $row = $sth->fetch(PDO::FETCH_ASSOC);
                    if(isset($row['MAX(ID)'])) {
                        $this->data['ID'] = $row['MAX(ID)'];
                        $this->id = $row['MAX(ID)'];
                    }
                }
                else {
                    if($debug) {
                        $err = $sth->errorInfo();
                        throw new Exception($err[2]);
                    }
                    else {
                        throw new Exception("Database Error occurred saving new data");
                    }
                }
            }
            //If id is not 0, it is existing, perform UPDATE
            else {
                foreach(array_keys($this->changed) as $key) {
                    if(in_array($this->changed[$key],$this->columns)) {
                        $query = "UPDATE " .static::$table. " SET ".$this->changed[$key]."=:value WHERE id=:id";
                        $sth = $this->db->prepare($query);
                        $sth->bindParam(":value",$this->data[$this->changed[$key]]);
                        $sth->bindParam(":id",$this->id,PDO::PARAM_INT);
                        if($sth->execute()) {
                            unset($this->changed[$key]);
                        }
                        else {
                            throw new Exception("Error saving data");
                        }
                    }
                    //This should never happen if you use the setter methods
                    else {
                        throw new Exception("$c is not a column");
                    }
                    unset($this->changed[$key]);
                }
            }
        }
    }

    public function delete() {
        $query = "DELETE FROM ".static::$table." WHERE id=$this->id";
        $sth = $this->db->prepare($query);
        return $sth->execute();
    }

    /**
     * Sets columns specified by array indicies to their values
     * @param Array $data
     * @throws Exception if column specified in index does not exist
     */
    function set($data) {
        foreach(array_keys($data) as $column) {
            $columnupper = strtoupper($column);
            if(in_array($columnupper,$this->columns)) {
                if($this->data[$columnupper]!=$data[$column]) {
                    $this->data[$columnupper] = $data[$column];
                    $this->changed[] = $columnupper;
                }
            }
            else {
                throw new Exception("$column is not a column");
            }
        }
    }

    function get($data) {
        //See if the data is a hasAndBelongsToMany relationship
        if(!empty($this->hasAndBelongsToMany)) {
            if(array_key_exists($data,$this->hasAndBelongsToMany)) {
                return $this->getHasAndBelongsToMany($data);
            }
        }
        if(!empty($this->hasOne)) {
            if(array_key_exists($data,$this->hasOne)) {
                return $this->getHasOne($data);
            }
        }
        if(!empty($this->hasMany)) {
            if(array_key_exists($data,$this->hasMany)) {
                return $this->getHasMany($data);
            }
        }
        if(!empty($this->belongsTo)) {
            if(array_key_exists($data,$this->belongsTo)) {
                return $this->getBelongsTo($data);
            }
        }

        //Otherwise retrieve normal column
        if(isset($this->data[strtoupper($data)])) {
            return $this->data[strtoupper($data)];
        }
        else {
            return null;
        }
    }
    /**
     * Returns HTML sanitized data
     * @param String $data
     */
    public function getClean($data) {
        //Otherwise retrieve normal column
        if(isset($this->data[strtoupper($data)])) {
            return htmlspecialchars($this->data[strtoupper($data)]);
        }
        else return null;
    }
    function getID() {
        return $this->id;
    }
    static function getTable() {
        return static::$table;
    }
    function isValid() {
        return $this->valid;
    }

    //***********************************************
    //These four functions return associated objects
    //specified in the hasOne, hasMany, belongsTo,
    //and hasAndBelongsToMany variables. Used in the
    //get() method
    //***********************************************
    protected function getHasOne($object_name) {
        $relationship = $this->hasOne[$object_name];
        $query = "SELECT * FROM ".$relationship['joinTable'];
        //$query.= " WHERE id=".$this->data[$relationship['foreignKey']];
        $query.= " WHERE ".$relationship['foreignKey']."=$this->id";
        $sth = $this->db->prepare($query);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $model = new $relationship['className']($row['ID'],$row);
        }
        if(isset($model)) {
            return $model;
        }
        else return false;
    }
    protected function getHasMany($object_name) {
        $relationship = $this->hasMany[$object_name];
        $query = "SELECT * FROM ".$relationship['joinTable'];
        $query.= " WHERE ".$relationship['foreignKey']."=$this->id";
        if(isset($relationship['suffix'])) {
            $query .= " ".$relationship['suffix'];
        }
        $sth = $this->db->prepare($query);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $models[] = new $relationship['className']($row['ID'],$row);
        }
        if(isset($models)) {
            return $models;
        }
        else return false;
    }
    protected function getBelongsTo($object_name) {
        $relationship = $this->belongsTo[$object_name];
        $query = "SELECT * FROM ".$relationship['joinTable'];
        $query.= " WHERE id=".$this->data[$relationship['foreignKey']];
        if(isset($relationship['suffix'])) {
            $query .= " ".$relationship['suffix'];
        }
        $sth = $this->db->prepare($query);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $model = new $relationship['className']($row['ID'],$row);
        }
        if(isset($model)) {
            return $model;
        }
        else return false;
    }
    protected function getHasAndBelongsToMany($object_name) {
        $relationship = $this->hasAndBelongsToMany[$object_name];
        $query = "SELECT * FROM ";
        $query .= $relationship['joinTable']. " WHERE ";
        $query .= $relationship['foreignKey'] . "=$this->id";
        if(isset($relationship['suffix'])) {
            $query .= " ".$relationship['suffix'];
        }
        $sth = $this->db->prepare($query);
        $sth->execute();

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $models[] = new $relationship['className']($row[$relationship['associationKey']],$row);
        }
        if(isset($models)) {
            return $models;
        }
        else return false;
    }
    protected function describeColumnsFromDB() {
        //Describe the columns of the object
        $query = "select column_name,data_type from all_tab_columns where table_name='".static::$table."'";
        $sth = $this->db->prepare($query);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $this->columns[] = $row['COLUMN_NAME'];
        }
    }
}