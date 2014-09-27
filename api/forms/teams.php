<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/autoload.php");
$tc = new TeamsController();
$uc = new UsersController();

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case "json-get-user-teams": {
			$email = $_GET['email'];
			$users = $uc->getBy("email",$email);
			if($users!=false) {
				$user = $users[0];
				$teams = $user->get("teams");
				foreach($teams as $t) {
					$json[] = Array("id"=>$t->get("id"),"name"=>$t->get("key"));
				}
				
				if(isset($json)) {
					echo json_encode($json);
				}
				else echo "[]";
			}
			else {
				echo "[success: false,message: 'email address not found']";
			}
		}
		default: 
			break;
	}
}