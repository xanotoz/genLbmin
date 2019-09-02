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
			$tbls = FieldsData::getAll($_GET["dbName"],$_GET["tblName"]); 
			//echo json_encode($tbls);
			$body = array();
			
			foreach ($tbls as $tbl) {
				$n = array(
						$tbl->Field,
						$tbl->Type,
						$tbl->Collation,
						$tbl->Null,
						$tbl->Key,
						$tbl->Default,
						$tbl->Extra,
						$tbl->Privileges,
						$tbl->Comment,
					);
				array_push($body, $n);
			} 
		?>
		</div>
	</div>

		<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">Vistas</div>
				<a href="#">
					<div class="panel-body">
						<h1 class="text-center"><i class='fa fa-eye'></i></h1>
						<p class="text-center">Las vistas sirven para mostrar contenido al usuario.</p>
					</div>
				</a>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">Acciones</div>
				<a href="#">
					<div class="panel-body">
						<h1 class="text-center"><i class='fa fa-flash'></i></h1>
						<p class="text-center">Las acciones sirven para procesar peticiones y ajax.</p>
					</div>
				</a>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">Modelos</div>
				<a href="#">
					<div class="panel-body">
						<h1 class="text-center"><i class='fa fa-table'></i></h1>
						<p class="text-center">Los modelos sirven para agilizar la manipulacion de datos de la bd.</p>
					</div>
				</a>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12">
		
		<h1>Campos en la tabla de Datos <i>"<?php echo $_GET["tblName"]; ?>"</i></h1>

		<?php
		
			$data = array(
				"header"=>array("Field","Type","Collation","Null","Key","Default","Extra","Privileges","Comment"),
				"body"=> $body
				);
			echo Table::render($data);


		?>

		</div>
	</div>


</div>
