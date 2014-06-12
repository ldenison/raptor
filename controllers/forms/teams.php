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
				$id = $users[0]->get("id");
				$teams = $tc->getBy("user_id",$id);
				$json[] = Array("id"=>1,"name"=>"PSS");
				$json[] = Array("id"=>2,"name"=>"Software Dev");
				$json[] = Array("id"=>91,"name"=>"NETENG");
				if($teams!=false) {
					foreach($teams as $t) {
						$json['id'] = $t->get("id");
						$json['name'] = $t->get("name");
					}
					echo json_encode($json);
				}
				else echo json_encode($json);
			}
			else {
				echo "[success: false,message: 'email address not found']";
			}
		}
		default: 
			break;
	}
}