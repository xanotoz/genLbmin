<?php
class TablesData {


	public function TablesData(){
		
		
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TablesData());
	}

	public static function getAll($k){
		 $sql = "SHOW FULL TABLES FROM ".$k;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TablesData());
	}




}

?>