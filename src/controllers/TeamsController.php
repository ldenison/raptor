<?php 
if(!isset($_SESSION)){
	session_start();
}

class TeamsController extends Controller {
	public static $table = "RAPTOR_TEAMS";
	public static $model = "Team";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/Team.php";
	public static $application_name = "raptor";
	
}
?>