<?php

	session_start();

	//var_dump($_POST);echo"<br>";

	$email= trim($_POST['email']);
	
	$filter_email = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	$flag_ok=true;

	if ($filter_email === false) {
        $error_ingreso= 'El email ingresado no es válido';
        $flag_ok=false;
     } else {
     		$name=buscar_cliente($email,$_POST['password']);
     		if ($name === false) {
				$error_ingreso = 'El email no existe o la password no es correcta';
				$flag_ok=false;
			} 
	} 

	if ($flag_ok){
		abrir_sesion($email,$name);
		header('Location:./../main.php');
		}
	else {
		$_SESSION['error_ingreso']=$error_ingreso;
		$_SESSION['filter_email']=$email;
		header('Location:./../ingresar.php');
	}
	


function abrir_sesion ($email,$nombre) {

	$_SESSION = array();

	//echo 'Estoy en abrir sesion'; echo "<br>";
	//echo 'Email: '.$email; echo "<br>";
	//echo 'Nombre: '.$nombre; echo "<br>";

	$_SESSION['email'] = $email;
	$_SESSION['nombre'] = $nombre;

	if (isset($_POST['recordarme']))
	{
	  $tiempoAbierto = time() + 60 * 60 * 3;
	  setcookie('email', $email, $tiempoAbierto, '/');
	  setcookie('nombre', $nombre, $tiempoAbierto, '/');
	}

	//var_dump($_SESSION) ;echo"<br>";
	//var_dump($_COOKIE) ;echo"<br>";

}    

	

function buscar_cliente($email,$password){

	
	$gestor = fopen("../data/clientes.txt", "r");

	
	if ($gestor) { 
		while (($registro = fgets($gestor)) !== false) {
	
			$cliente=json_decode($registro,true);			

			if (($cliente['email'] == $email ) & ($cliente['password']==$password)){
				fclose($gestor);
				return $cliente['nombre']; 
			}
		} 
	} 

	fclose($gestor);
	return FALSE;

}