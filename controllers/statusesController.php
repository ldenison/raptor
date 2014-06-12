<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/controller.php");

class StatusesController extends Controller {
	public static $table = "RAPTOR_STATUSES";
	public static $model = "Status";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/status.php";
	public static $application_name = "raptor";
	
}
?>