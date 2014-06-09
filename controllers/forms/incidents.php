<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/autoload.php");
$ic = new IncidentsController();

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case "create": {
			$ic->create($_POST);
		}
	}
}
?>