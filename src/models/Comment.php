<?php
class Comment extends Model {
	public static $table = "RAPTOR_COMMENTS";
	
	public $belongsTo = array(
		"incident" =>
			array(
				'className' => 'Incident',
				'joinTable' => 'RAPTOR_INCIDENTS',
				'foreignKey' => 'INCIDENT_ID',
		),
		"user" =>
			array(
				'className' => 'User',
				'joinTable' => 'RAPTOR_USERS',
				'foreignKey' => 'USER_ID'
		)
	);
}