<?php
class User extends Model {
	public static $table = "RAPTOR_USERS";
	
	public $hasAndBelongsToMany = array(
		"teams" =>
			array(
				'className' => 'Team',
				'joinTable' => 'RAPTOR_TEAMS_USERS',
				'foreignKey' => 'USER_ID',
				'associationKey' => 'TEAM_ID'
			)
	);
}