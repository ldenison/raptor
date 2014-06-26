<?php 
require_once(getenv("DOCUMENT_ROOT")."/raptor/lib/mvc/model.php");

class Comment extends Model {
	public static $table = "RAPTOR_COMMENTS";
	public static $databaseUser = "ldenison";
	
	public $belongsTo = array(
		"incident" =>
			array(
				'className' => 'Incident',
				'joinTable' => 'RAPTOR_INCIDENTS',
				'foreign_key' => 'INCIDENT_ID',
		),
		"user" =>
			array(
				'className' => 'User',
				'joinTable' => 'RAPTOR_USERS',
				'foreign_key' => 'USER_ID'
		)
	);
}
?>