<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/controller.php");

class ClientsController extends Controller {
	public static $table = "RAPTOR_CLIENTS";
	public static $model = "Client";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/client.php";
	public static $application_name = "raptor";
	
}
?>