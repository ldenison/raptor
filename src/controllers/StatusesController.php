<?php 
if(!isset($_SESSION)){
	session_start();
}

class StatusesController extends Controller {
	public static $table = "RAPTOR_STATUSES";
	public static $model = "Status";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Status.php";
	public static $application_name = "raptor";
	
}
?>