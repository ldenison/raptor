<?php 
function __autoload($class_name) {
	$class_name = lcfirst($class_name);
	if(file_exists(getenv("DOCUMENT_ROOT")."/raptor/models/$class_name.php")) {
		require_once(getenv("DOCUMENT_ROOT")."/raptor/models/$class_name.php");
	}
	elseif(file_exists(getenv("DOCUMENT_ROOT")."/raptor/controllers/$class_name.php")) {
		require_once(getenv("DOCUMENT_ROOT")."/raptor/controllers/$class_name.php");
	}
}
?>