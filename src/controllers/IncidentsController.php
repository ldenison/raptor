<?php 
if(!isset($_SESSION)){
	session_start();
}

class IncidentsController extends Controller {
	public static $table = "RAPTOR_INCIDENTS";
	public static $model = "Incident";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Incident.php";
}
?>