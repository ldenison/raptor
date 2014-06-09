<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/mvc/controller.php");

class FiltersController extends Controller {
	public static $table = "RAPTOR_FILTERS";
	public static $model = "Filter";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/filter.php";
	public static $application_name = "raptor";
	
}
?>