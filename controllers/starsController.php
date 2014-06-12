<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/controller.php");

class PrioritiesController extends Controller {
	public static $table = "RAPTOR_STARS";
	public static $model = "Star";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/star.php";
	public static $application_name = "raptor";
	
}
?>