<?php 
if(!isset($_SESSION)){
	session_start();
}
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/mvc/controller.php");

class StarsController extends Controller {
	public static $table = "RAPTOR_STARS";
	public static $model = "Star";
	public static $databaseUser = "ldenison";
	public static $modelPath = "/raptor/models/star.php";
	public static $application_name = "raptor";
	
	
	public function hasStar($incident_id,$user_id) {
		$clauses[] = Array("column"=>"incident_id","value"=>$incident_id,"comparator"=>"=");
		$clauses[] = Array("column"=>"user_id","value"=>$user_id,"comparator"=>"=","prepend"=>"AND");
		
		return $this->filter($clauses);
	}
}
?>