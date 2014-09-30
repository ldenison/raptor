<?php
function raptorAutoloader($class_name) {
    $path = get_include_path();
    if($class_name=="DB") {
        require("src/lib/pancake/Database.php");
    }
    elseif(file_exists("$path/src/lib/pancake/$class_name.php")) {
        require("src/lib/pancake/$class_name.php");
    }
	elseif(file_exists("$path/src/models/$class_name.php")) {
		require("src/models/$class_name.php");
	}
	elseif(file_exists("$path/src/controllers/$class_name.php")) {
		require("src/controllers/$class_name.php");
	}
}
spl_autoload_register("raptorAutoloader");