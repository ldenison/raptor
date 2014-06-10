<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/app/autoload.php");
$ic = new IncidentsController();
$cc = new ClientsController();

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case "create": {
			$clients = $cc->getBy("email",($_POST['client']));
			if(sizeof($clients)!=1) {
				$_SESSION['raptor']['error'] = "System Error: Multiple client matches found. Contact your system administrator.";
				header("Location: ".$_SERVER['HTTP_REFERER']);
				die();
			}
			$client = $clients[0]->get("id");
			
			$data['client_id'] = $client;
			$data['description'] = $_POST['description'];
			$data['priority_id'] = $_POST['priority_id'];
			$data['status_id'] = 1;
			$data['created'] = DB::oracleTime("now");
			$data['due'] = DB::oracleTime("now + 3 days");
			$data['type_id'] = $_POST['type_id'];
			$data['assigned_to'] = $_POST['assigned_to'];
			
			$incident = new Incident(0,$data);
			try {
				$incident->save();
				$id = $incident->get("id");
				header("Location:/raptor/views/incidents/view-incident?id=$id");
				die();
			}
			catch(Exception $e) {
				$_SESSION['raptor']['error'] = "Error creating incident: ".$e->getMessage();
				header("Location: ".$_SERVER['HTTP_REFERER']);
				die();
			}
		}
	}
}
?>