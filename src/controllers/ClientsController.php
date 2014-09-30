<?php 
if(!isset($_SESSION)){
	session_start();
}

class ClientsController extends Controller {
	public static $table = "RAPTOR_CLIENTS";
	public static $model = "Client";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Client.php";
	public static $application_name = "raptor";
	
}
?>