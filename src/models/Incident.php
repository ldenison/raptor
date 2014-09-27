<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Incident extends Model {
	public static $table = "RAPTOR_INCIDENTS";
	
	public function printDate($date) {
		if(!empty($date)) {
			return date("m/d/Y",strtotime($date));
		}
		else return "";
	}
}
?>