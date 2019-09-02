<?php 
class PersonData {

	public static $tablename = 'person';
	
	public function PersonData(){

			$this->id;
			$this->name = "";
			$this->lastname = "";
			$this->email = "";
			$this->address = "";
			$this->phone = "";
			$this->image = "";
			$this->created_at = "NOW();"

	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id,name,lastname,email,address,phone,image,created_at)";
		$sql .= "value ( \"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->password\",\"$this->created_at) ";
		Executor::doit($sql);
	}

	

}


?>