<?php
class FieldsData {


	public function FieldsData(){
		$this->Field = "";
		$this->Type = "";
		$this->Collation = "";
		$this->Null = "";
		$this->Key = "";
		$this->Default = "";
		$this->Extra = "";
		$this->Privileges = "";
		$this->Comment = "";

		
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FieldsData());
	}

	public static function getAll($k,$v){
		 $sql = "SHOW FULL FIELDS FROM ".$k.".".$v;
		// echo "sql:".$sql;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FieldsData());
	}




}

?>