<?php
	
$myDir = "../genLbmin/core/app/genOut/BD-".$_GET["dbName"]."/model";
if (!is_dir($myDir)) { 
	mkdir($myDir, 0777, true); // true for recursive create 
} 

$miArchivo = fopen($myDir."/".ucfirst($_GET["dbTbl"])."Data.php", "w") or die("No se puede abrir/crear el archivo!");
// $miArchivo = fopen("../genOut/".$_GET["dbName"]."/".$_GET["dbTbl"]."/".$_GET["dbTbl"]."Data.php", "w") or die("No se puede abrir/crear el archivo!");

//Creamos una variable personalizada

$className = ucfirst($_GET['dbTbl']).'Data';
$tblFields = FieldsData::getAll($_GET["dbName"],$_GET["dbTbl"]); 
//echo json_encode($fields);
$classFields = array();
/*foreach ($tblFields as $f) {
		/*echo 'Json:'.$f->Field;
		$classFields .= "\$this->".$f->Field.";
		";
		array_push($classFields, $f->Field);
} */

$php = "<?php 
class $className {

	public static \$tablename = '".$_GET['dbTbl']."';
	
	public function $className(){

		".fieldsToConvert($tblFields,'$this->','
			',true)."

	}

	public function add(){
		\$sql = \"insert into \".self::\$tablename.\" (".fieldsToConvert($tblFields,"",",").")\";
		\$sql .= \"value ( \\\"\$this->name\\\",\\\"\$this->lastname\\\",\\\"\$this->username\\\",\\\"\$this->email\\\",\\\"\$this->password\\\",\\\"\$this->created_at) \";
		Executor::doit(\$sql);
	}

	

}


?>";

fwrite($miArchivo, $php);
fclose($miArchivo);

function fieldsToConvert($tblFields,$strignBegin,$stringEnding,$constructor = false){
	$textConvert = "";
	$i = 1;
	foreach ($tblFields as $f) {
		//*echo 'Json:'.$f->Field;
		if($i == 1 && $constructor){
			$textConvert .= "	";
		}
		$textConvert .= $strignBegin.$f->Field;
		//$textConvert .= ($f->Type == "varchar")?:;
		if($constructor){
			if(stristr($f->Type, 'date')) {
    			$textConvert .= ' = "NOW();"';
	
	 		}elseif(stristr($f->Type, 'int')){
	 			if($f->Extra != "auto_increment"){

	    			$textConvert .= ' = 0;';
	 			}else{
	 				$textConvert .=";" ;
	 			}
	 		}else{
	    		$textConvert .= ' = "";';
 			}

 		}
	

 		if($i != sizeof($tblFields) ){

			$textConvert .= $stringEnding;
 		}
		$i++;
	}

	return $textConvert;

}
?>