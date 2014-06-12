<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/autoload.php");

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case "create": {
			
		}
		default: {
			$_SESSION['raptor']['error'] = "Invalid action";
			header("Location: ".$_SERVER['HTTP_REFERER']);
			die();
		}
	}
	
}