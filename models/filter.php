<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/model.php");

class Filter extends Model {
	public static $table = "RAPTOR_FILTERS";
	public static $databaseUser = "ldenison";
	
}
?>