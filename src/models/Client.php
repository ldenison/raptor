<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Client extends Model {
	public static $table = "RAPTOR_CLIENTS";
	public static $databaseUser = "ldenison";
	
}
?>