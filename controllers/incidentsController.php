<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/mvc/controller.php");

class IncidentsController extends Controller {
	public static $table = "RAPTOR_INCIDENTS";
	public static $model = "Incident";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/incident.php";
	
}
?>