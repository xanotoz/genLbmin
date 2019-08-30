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
		<h2>Hola, <?php echo $user->name; ?></h2>
		<p>Selecciona la base de datos que deseas generar los archivos.</p>
		<?php 
			$dbs = DatabaseData::getAll(); 
			// echo json_encode($d);
			$body = array();
			foreach ($dbs as $db) {
				$n = array(
						$db->Database,
						"<a class='btn btn-info' href='index.php?view=showDb&name=".$db->Database."'>Ver</a>"
					);
				array_push($body, $n);
			} 
		?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		
		<h1>Bases de datos en Localhost</h1>

		<?php
		
			$data = array(
				"header"=>array("#","Base de datos",""),
				"body"=> $body
				);
			echo Table::render($data);


		?>

		</div>
	</div>
</div>
