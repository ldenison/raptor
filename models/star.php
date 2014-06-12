<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/model.php");

class Star extends Model {
	public static $table = "RAPTOR_STARS";
	public static $databaseUser = "ldenison";
	
}
?>