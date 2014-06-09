<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/autoload.php");
$ic = new IncidentsController();

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case "create": {
			$incident = new Incident(0,$_POST);
			$id = $incident->get("id");
			header("Location:/raptor/views/incidents/view-incident?id=$id");
		}
	}
}
?>