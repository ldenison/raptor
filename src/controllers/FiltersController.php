<?php 
if(!isset($_SESSION)){
	session_start();
}

class FiltersController extends Controller {
	public static $table = "RAPTOR_FILTERS";
	public static $model = "Filter";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Filter.php";
	public static $application_name = "raptor";
	
}
?>