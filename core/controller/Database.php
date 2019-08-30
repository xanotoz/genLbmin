<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="compusoft";$this->pass="compusoft2015";$this->host="localhost";$this->ddbb="genlbm";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
