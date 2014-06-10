<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/controller.php");

class UsersController extends Controller {
	public static $table = "RAPTOR_USERS";
	public static $model = "User";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/user.php";
	public static $application_name = "raptor";
}
?>