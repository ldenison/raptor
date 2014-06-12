<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Star extends Model {
	public static $table = "RAPTOR_STARS";
	public static $databaseUser = "ldenison";
	
}
?>