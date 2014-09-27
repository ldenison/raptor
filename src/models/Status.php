<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Status extends Model {
	public static $table = "RAPTOR_STATUSES";
	public static $databaseUser = "ldenison";
	
}
?>