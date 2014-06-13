<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class User extends Model {
	public static $table = "RAPTOR_USERS";
	public static $databaseUser = "ldenison";
	
	public $hasAndBelongsToMany = array(
		"teams" =>
			array(
				'className' => 'Team',
				'joinTable' => 'RAPTOR_TEAMS_USERS',
				'foreign_key' => 'USER_ID',
				'association_key' => 'TEAM_ID'
			)
	);
}
?>