<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/controller.php");

class TeamsController extends Controller {
	public static $table = "RAPTOR_TEAMS";
	public static $model = "Team";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/team.php";
	public static $application_name = "raptor";
	
}
?>