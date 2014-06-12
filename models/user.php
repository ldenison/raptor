<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class User extends Model {
	public static $table = "RAPTOR_USERS";
	public static $databaseUser = "ldenison";
	
}
?>