<?php 
if(!isset($_SESSION)){
	session_start();
}

class UsersController extends Controller {
	public static $table = "RAPTOR_USERS";
	public static $model = "User";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/User.php";
	public static $application_name = "raptor";
}
?>