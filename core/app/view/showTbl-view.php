<?php
// si el usuario no esta logeado
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		
		<?php 
			$tbls = TablesData::getAll($_GET["name"]); 
			// echo json_encode($d);
			$body = array();
			foreach ($tbls as $tbl) {
				$n = array(
						$tbl->{"Tables_in_".$_GET["name"]},
						"<a class='btn btn-info' href='index.php?view=showTbl&name=".$tbl->{"Tables_in_".$_GET["name"]}."'>Ver</a>"
					);
				array_push($body, $n);
			} 
		?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		
		<h1>Campos en la tabla de Datos <i>"<?php echo $_GET["name"]; ?>"</i></h1>

		<?php
		
			$data = array(
				"header"=>array("#","Tabla",""),
				"body"=> $body
				);
			echo Table::render($data);


		?>

		</div>
	</div>
</div>
