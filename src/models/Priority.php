<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Priority extends Model {
	public static $table = "RAPTOR_PRIORITIES";
	public static $databaseUser = "ldenison";
	
}
?>