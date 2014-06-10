<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/model.php");

class Incident extends Model {
	public static $table = "RAPTOR_INCIDENTS";
	public static $databaseUser = "ldenison";
	
	public function printDate($date) {
		if(!empty($date)) {
			return date("m/d/Y",strtotime($date));
		}
		else return "";
	}
}
?>