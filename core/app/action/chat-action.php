<?php
//include "Executor.php";
//include "Database.php";


$opc = 1;//$_POST['opc'];
$usuario_id = 1;
$usuario_chat_id=2;
switch ($opc) {
	case '1':// Cargar mensajes.

		$sql = "SELECT * FROM mensaje WHERE (Usuario_chat_idUsuario_de=".$usuario_id." AND Usuario_chat_idUsuario_para=".$usuario_chat_id.") OR (Usuario_chat_idUsuario_de=".$usuario_chat_id." AND Usuario_chat_idUsuario_para=".$usuario_id.")";
		//echo $sql;
		$query = Executor::doit($sql);
		$q = $query[0]->fetch_array();
		foreach ($q as $key) { //=> $value
			echo "Q[0] : ";
			echo $q[0];
			echo "\r";

			echo "Q[1] : ";
			echo $q[1];
			echo "\r";

			echo "Q[2] : ";
			echo $q[2];
			echo "\r";

			echo "Q[3] : ";
			echo $q[3];
			echo "\r";

			echo "Q[4] : ";
			echo $q[4];
			echo "\r";

			echo "Q[5] : ";
			echo $q[5];
			echo "\r";
			//echo $q['Usuario_chat_idUsuario_de'];

		}

		$cant=3;
		$cant_msj_no_enviados= ($cant>100) ? 100:$cant;
		$usuario_id_emisor = 2;
		$tipo_msj = ($usuario_id==$usuario_id_emisor) ? "left clearfix admin_chat":"left clearfix"; // osea tipo recibido
		$avatar_usuario='<img src="https://lh3.googleusercontent.com/-wFvKGy3-Guc/AAAAAAAAAAI/AAAAAAAAAF4/lpILd8HRflc/s60-p-no/photo.jpg"';
		$contenido_msj = 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.';
		$hora_msj='09:40PM';
		
		for ($i=0; $i < $cant_msj_no_enviados; $i++) { 
		
			$cuerpo_msj= '<li class="'.$tipo_msj.'">';
			$cuerpo_msj.='<span class="chat-img1 pull-left">';
			$cuerpo_msj.= $avatar_usuario.'alt="User Avatar" class="img-circle">';
			$cuerpo_msj.= '</span>';
			$cuerpo_msj.= '<div class="chat-body1 clearfix">';
			$cuerpo_msj.= '<p>'.$contenido_msj.'</p>';
			$cuerpo_msj.=	'<div class="chat_time pull-right">'.$hora_msj.'</div>';
			$cuerpo_msj.= '</div>';
			$cuerpo_msj.= '</li>';
			echo $cuerpo_msj;
		}
		break;

	
	default:
		echo alert('Switch default');
		break;
}

?>