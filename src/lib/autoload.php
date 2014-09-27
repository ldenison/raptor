<?php 
function __autoload($class_name) {

	if(file_exists(getenv("DOCUMENT_ROOT")."/raptor/src/models/$class_name.php")) {
		require_once(getenv("DOCUMENT_ROOT")."/raptor/src/models/$class_name.php");
	}
	elseif(file_exists(getenv("DOCUMENT_ROOT")."/raptor/src/controllers/$class_name.php")) {
		require_once(getenv("DOCUMENT_ROOT")."/raptor/src/controllers/$class_name.php");
	}
}
?>