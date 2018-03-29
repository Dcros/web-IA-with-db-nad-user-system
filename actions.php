<?php
	error_reporting(0);

	$langCode = "en_us";
	$errorMessage = "I dont understand you";
	if (isset($_POST['language']) && $_POST['language'] == '3') {
		$langCode = "en_us";
		$errorMessage = "I dont understand you";
		$messageLoginSteep1 = "Ok %d1, now need your password";
		$messageLoginError1 = "I dont find your username";
		$messageLoginError2 = "The password dont match";
		$messageLoginError3 = "Unespected error try again";
		$messageLoginSteep2 = "Wellcome %d1";
	}
	else if (isset($_POST['language']) && $_POST['language'] == '6') {
		$langCode = "es_es";
		$errorMessage = "No te he entendido";
		$messageLoginSteep1 = "Bien %d1, ahora necesito tu contraseña";
		$messageLoginError1 = "No he podido encontrar el usuario";
		$messageLoginError2 = "La contraseña no coincide";
		$messageLoginError3 = "Error inesperado intentelo de nuevo";
		$messageLoginSteep2 = "Bienvenido %d1";
	}

	$conex = mysqli_connect("localhost", "root", "", "jarvi");

	if (isset($_POST['searchResponse']) && $_POST['searchResponse'] == '1' && isset($_POST['keywordSearch'])) {

		$sql = "SELECT * FROM ".$langCode." WHERE keywords LIKE '%".$_POST['keywordSearch']."%' LIMIT 0,1";
		$query = mysqli_query($conex, $sql);
		$row = mysqli_fetch_assoc($query);
		if ($row != false) {
			echo json_encode(array('status'=>'ok', 'message'=>$row['value'], "action"=>$row['action']));
		}
		else
		{
			echo json_encode(array('status'=>'error', 'message'=>$errorMessage, "search"=>$_POST['keywordSearch']));
		}

	}
	else if (isset($_POST['searchUser']) && $_POST['searchUser'] == '1' && isset($_POST['keywordSearch'])) {

		$sql = "SELECT * FROM usuarios WHERE usuario_nombre='".$_POST['keywordSearch']."' LIMIT 0,1";
		$query = mysqli_query($conex, $sql);
		$row = mysqli_fetch_assoc($query);
		if ($row != false) {
			$newStr = str_replace("%d1", $row['usuario_nombre'], $messageLoginSteep1);
			echo json_encode(array('status'=>'ok', 'message'=>$newStr, "action"=>"5", "user"=>$row['usuario_nombre']));
		}
		else
		{
			echo json_encode(array('status'=>'error', 'message'=>$messageLoginError1, "search"=>$_POST['keywordSearch']));
		}

	}
	else if (isset($_POST['searchPassword']) && $_POST['searchPassword'] == '1' && isset($_POST['userSession']) && isset($_POST['keywordSearch'])) {

		$sql = "SELECT * FROM usuarios WHERE usuario_nombre='".$_POST['userSession']."' LIMIT 0,1";
		$query = mysqli_query($conex, $sql);
		$row = mysqli_fetch_assoc($query);
		if ($row != false) {
			if ($row['usuario_clave'] == $_POST['keywordSearch']) {
				$newStr = str_replace("%d1", $row['usuario_nombre'], $messageLoginSteep2);
				echo json_encode(array('status'=>'ok', 'message'=>$newStr, "action"=>"7"));
					$sql = mysql_query("SELECT usuario_id, usuario_nombre, usuario_clave FROM usuarios WHERE usuario_nombre='".$usuario_nombre."' AND usuario_clave='".$usuario_clave."'");
			}else{
				echo json_encode(array('status'=>'error', 'message'=>$messageLoginError2, "search"=>$_POST['keywordSearch']));
			}
		}
		else
		{
			echo json_encode(array('status'=>'error', 'message'=>$messageLoginError3, "search"=>$_POST['keywordSearch']));
		}

	}
	else if (isset($_POST['sessionSave']) && $_POST['sessionSave'] == '1' && isset($_POST['userSession']) && isset($_POST['keywordSearch'])) {

		$sql = "SELECT * FROM usuarios WHERE usuario_nombre='".$_POST['userSession']."' LIMIT 0,1";
		$query = mysqli_query($conex, $sql);
		$row = mysqli_fetch_assoc($query);
		if ($row != false) {
			if($row = mysql_fetch_array($sql)) {
				echo json_encode(array('status'=>'ok', 'message'=>$newStr, "action"=>"6"));
                $_SESSION['usuario_id'] = $row['usuario_id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id 
                $_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                header("Location: index.php"); 
            }else { 
				echo json_encode(array('status'=>'error', 'message'=>$messageLoginError2, "search"=>$_POST['keywordSearch']));
			}
		}
		else
		{
			echo json_encode(array('status'=>'error', 'message'=>$messageLoginError3, "search"=>$_POST['keywordSearch']));
		}

	}
	else if (isset($_POST['weatherActual']) && $_POST['weatherActual'] == "1") {
		define('API_URL', 'http://samples.openweathermap.org/data/2.5/find');
		define('API_KEY', 'd0cecef28942114caf97ef26b5562661');
		$content = file_get_contents(API_URL."?q=Madrid,es&appid=".API_KEY."&units=metric");
		echo $content;
	}

	mysqli_close($conex);
	return;

?>