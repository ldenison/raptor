<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/mvc/controller.php");

class PrioritiesController extends Controller {
	public static $table = "RAPTOR_PRIORITIES";
	public static $model = "Priority";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/priority.php";
	public static $application_name = "raptor";
	
}
?>