<?php 
if(!isset($_SESSION)){
	session_start();
}

class PrioritiesController extends Controller {
	public static $table = "RAPTOR_PRIORITIES";
	public static $model = "Priority";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Priority.php";
	public static $application_name = "raptor";
	
}
?>