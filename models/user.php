<?php 
require_once(getenv("DOCUMENT_ROOT")."/mvc/model.php");

class User extends Model {
	public static $table = "RAPTOR_USERS";
	public static $databaseUser = "ldenison";
	
}
?>