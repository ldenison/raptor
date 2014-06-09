<?php 
require_once(getenv("DOCUMENT_ROOT")."/mvc/model.php");

class Incident extends Model {
	public static $table = "RAPTOR_INCIDENTS";
	public static $databaseUser = "ldenison";
	
}
?>