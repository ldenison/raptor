<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/autoload.php");
$ic = new IncidentsController();
$cc = new ClientsController();
$uc = new UsersController();

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
			$data['team_id'] = $_POST['team_id'];
			
			$assignee = $uc->getBy("email",$_POST['assigned_to']);
			if($assignee!=false) {
				$data['assigned_to'] = $assignee[0]->get("id");
			}
			
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
			break;
		}
		case "star": {
			//Add a star
			if($_GET['set']=="true") {
				try {
					$data['incident_id'] = $_GET['id'];
					$data['user_id'] = $_SESSION['raptor']['user_id'];
					$star = new Star(0,$data);
					$star->save();
					die();
				}
				catch(Exception $e) {
					echo "[success: false,error: 'database write error occurred']";
					die();
				}
			}
			//Remove a star
			else {
				$star = new Star($_GET['id']);
				$star->delete();
			}
			break;
		}
		case "close": {
			$incident = new Incident($_POST["id"]);
			$incident->set("close_time",DB::oracleTime("now"));
			$incident->set("close_comment",$_POST['close_comment']);
			$incident->set("status_id",2);
			try {
				$incident->save();
				header("Location: ".$_SERVER['HTTP_REFERER']);
				die();
			}
			catch(Exception $e) {
				$_SESSION['raptor']['error'] = "Error closing incident";
				header("Location: ".$_SERVER['HTTP_REFERER']);
				die();
			}
			break;
		}
	}
}
?>