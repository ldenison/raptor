<?php 
require_once(getenv("DOCUMENT_ROOT")."/mvc/model.php");

class Team extends Model {
	public static $table = "RAPTOR_TEAMS";
	public static $databaseUser = "ldenison";
	
}
?>