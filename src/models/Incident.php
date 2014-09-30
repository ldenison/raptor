<?php
class Incident extends Model {
	public static $table = "RAPTOR_INCIDENTS";
	
	public function printDate($date) {
		if(!empty($date)) {
			return date("m/d/Y",strtotime($date));
		}
		else return "";
	}
}