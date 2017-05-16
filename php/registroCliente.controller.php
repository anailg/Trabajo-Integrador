<?php
	session_start();


	if (isset($_POST['cancelar'])){
		$_SESSION = array();
		session_destroy($_SESSION);
		header("Location:../main.php");
		exit; 
	}

	$_SESSION['titulo_err'] ='';
	$_SESSION['mensajes_error']=[];
	$_SESSION['cliente']=[];


	if (cliente_valido()) {

		if (guardar_cliente()) {

			/* ir a pagina de exito */
			$_SESSION = array();
			session_destroy($_SESSION);
			header("Location:../registroCliente_exito.php");
			exit; 		
		}
		else { 
			   $_SESSION['titulo_error'] =
			   "Se produjo un error al guardar el registro, por favor intentelo nuevamente." ;			
		}

	} else { 
				$_SESSION['titulo_error']="Por favor revise los datos ingresados";
				
	}

	/* volver al formulario */
	header("Location:../registroCliente.php");
	exit;


/* Inicializo el array de cliente */
function init_arr_cliente () { 

	global $arr_cliente;
	
	
	$arr_cliente = [
		'id'=> 0,
		'email' => '',
		'password' =>'',
		'nombre' =>'',
		'apellido' =>'',
		'sexo' =>'',
		'fechanac' =>0,
		'direccion' =>'',
		'codpostal' =>'',
		'localidad' =>'',
		'provincia' =>'',
		'avatar' => ''
		];

}

function init_arr_errores () { 

	global $arr_errores;
	
	
	$arr_errores = [
		'email' => '',
		'password' =>'',
		'nombre' =>'',
		'apellido' =>'',
		'sexo' =>'',
		'fechanac' =>'',
		'direccion' =>'',
		'codpostal' =>'',
		'localidad' =>'',
		'provincia' =>'',
		'avatar' => ''
		];

}

/* Devuelve TRUE si el cliente  es valido o FALSE en caso contrario. Setea el arr_cliente con los datos del  
   que se necesitan para guardarlo*/
function cliente_valido () { 		


	global $arr_cliente;
	global $arr_errores;

	/* hago validaciones correspondientes, si todo esta bien devuelvo TRUE y el arr_cliente con los valores validados, sino devuelvo FALSE y cargo un array global de errores */
	
	init_arr_cliente();
	init_arr_errores();		
	
 
	/* -------  VALIDACIONES --------------------------------------*/
		$flag_ok = true;

		/* --- Validaciones email ------*/
		$arr_cliente['email']= trim($_POST['email']);
		
		$email = filter_var($arr_cliente['email'], FILTER_VALIDATE_EMAIL);
		
		if ($email === false) {
            $arr_errores['email'] = 'El email ingresado no es válido';
            $flag_ok=false;
         } elseif (existe_cliente($arr_cliente['email'])) {
			$arr_errores['email'] = 'El email ingresado ya existe';
			$flag_ok=false;
		}     
        
		/* --- Validaciones password ------*/

		$arr_cliente['password'] = $_POST['password'] ;
		if ( (strlen($arr_cliente['password']) < 6) || (strlen($arr_cliente['password']) > 20)) {
			$flag_ok=false;
            $arr_errores['password'] = 'La contraseña debe tener al menos 6 caracteres y no mas de 20';
        } elseif ($_POST['password'] !== $_POST['password2']) {
			$flag_ok=false;
			$arr_errores['password'] = 'Las contraseñas no coinciden';
										//.$_POST['password']. ' !== '.$_POST['password2'];
        }

        /* --- Validaciones Nombre ------*/

		$arr_cliente['nombre'] = trim($_POST['nombre']) ;
		if (strlen($arr_cliente['nombre']) > 20) {
			$flag_ok=false;
            $arr_errores['nombre'] = 'El nombre no puede superar los 20 caracteres';
        }

        /* --- Validaciones Apellido ------*/

		$arr_cliente['apellido']= trim($_POST['apellido']) ;
		if (strlen($arr_cliente['apellido']) > 30) {
			$flag_ok=false;
            $arr_errores['apellido'] = 'El apellido no puede superar los 30 caracteres';
        }

        /* --- Validaciones Avatar ------*/
        /*
        If ( ($_FILES['avatar']['name']!=='') & ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK)) {
        	$flag_ok=false;
            $arr_errores['avatar'] = 'Falló la carga del archivo de imagen';
        }
        */

        /* --- Validaciones Sexo ------*/

		$arr_cliente['sexo']= trim($_POST['sexo']) ;
		if (($arr_cliente['sexo'] !== 'femenino') & ($arr_cliente['sexo'] !== 'masculino')){
			$flag_ok=false;
            $arr_errores['sexo'] = 'Sexo invalido';
        }

        /* --- Validaciones Fecha Nacimiento ------*/
        $arr_cliente['fechanac']=$_POST['fechanac'];
 		
		if (!($arr_cliente['fechanac'])){		  
			if (fecha_invalida($arr_cliente['fechanac'])) {
					$flag_ok=false;
					 $arr_errores['fecha'] = 'La fecha de nacimiento no es valida';
			}
        }

        /* --- Validaciones Direccion ------*/
        $arr_cliente['direccion']= trim($_POST['direccion']) ;
		if (strlen($arr_cliente['direccion']) > 100) {
			$flag_ok=false;
            $arr_errores['direccion'] = 'La direccion es muy larga';
        }

        /* --- Validaciones Codigo Postal ------*/
        $cp_invalido=false;
        $arr_cliente['codpostal']= trim($_POST['codpostal']) ;
        $long_cp=strlen($arr_cliente['codpostal']);
        if (($long_cp!==8) & ($long_cp!==4) ){
        	$cp_invalido=true;         	        	
        } else {
	        	if ($long_cp==8){
	        		$arr_errores['codpostal']=strtoupper($arr_errores['codpostal']);
	        		if (!((solo_letras(substr($arr_errores['codpostal'],0,1))) &
	        			  (solo_numeros(substr($arr_errores['codpostal'],1,4)))&
	        			  (solo_letras(substr($arr_errores['codpostal'],5,3))) ) ){
	        			$cp_invalido=true;
	        		}

        		} elseif (!(solo_numeros(substr($arr_errores['codpostal'],1,4)))){
        		  	$cp_invalido=true;
        		}
        		
        	}
        if ($cp_invalido) {
        	$flag_ok=false;
        	$arr_errores['codpostal'] ='El codigo postal no es válido ';
        }

    
        /* --- Validaciones Localidad ------*/
        $arr_cliente['localidad']= trim($_POST['localidad']) ;

        /* --- Validaciones Provincia ------*/
        $arr_cliente['provincia']= trim($_POST['provincia']) ;
        if (($arr_cliente['provincia'] !== 'Buenos Aires') & 
        	($arr_cliente['provincia'] !== 'Capital Federal')){

			$flag_ok=false;
            $arr_errores['provincia'] = 'Disculpe no entregamos en esa provincia.';
        }


	$_SESSION['cliente'] = $arr_cliente;
	$_SESSION['mensajes_error'] = $arr_errores;
	

	return $flag_ok;
}


/* FUNCION guardar_cliente: devuelve TRUE si todo sale bien o FALSE en caso contrario.
    Usa un array asociativo global con el siguiente formato:
	$arr_cliente ['id','email',password','nombre','apellido','sexo','fecha_nac',
				  'direccion','codpostal','localidad','provincia','avatar']     */
function guardar_cliente() {

	global $arr_cliente;

	
    $arr_cliente['id'] = uniqid(); 

    
    If ($_FILES['avatar']['error'] == UPLOAD_ERR_OK) {

    	$origen = $_FILES['avatar']['tmp_name'];

    	$ext = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    	$nombre = $arr_cliente['nombre'].$arr_cliente['id'].".".$ext;

    	$destino = __DIR__ . './data/images/'.$nombre;

    	$arr_cliente['avatar']=$destino;
    	
    	If (!move_uploaded_file($origen, $destino)) {
	    		/* Fallo la copia del archivo de imagen => Dar algun WARNING */
	    		//$warning="No se pudo ubicar el avatar en la carpeta destino";
	    		$arr_cliente['avatar']='';
		}
	}

    else {

    	$arr_cliente['avatar']='';

    }

    $cliente_json= json_encode($arr_cliente);


	If (file_put_contents('../data/clientes.txt', $cliente_json . PHP_EOL , FILE_APPEND | LOCK_EX)){
   	
			return TRUE; /* vuelve con exito siempre que el registro se guarde en el archivo de clientes.*/
		}

	 	else { 

	    	return FALSE;  /* Devuelve FALSE solo cuando no puede guardar el registro en el archivo de clientes */
    	}    

}

function existe_cliente($email){

	
	$gestor = fopen("../data/clientes.txt", "r");

	if ($gestor) { 
		while (($registro = fgets($gestor)) !== false) {
	
			$cliente=json_decode($registro,true);

			if ($cliente['email'] == $email ) {
				fclose($gestor);
				return TRUE; 
			}
		} 
	} 

	fclose($gestor);
	return FALSE;

}

function solo_letras($string){

	$flag=true;

	$tope=strlen($string);

	for ($i=0; $i<$tope;$i++){
		echo $i; 
		echo "<br>";
		echo ord($string[$i]);
		echo "<br>";
		if ((ord($string[$i])<65) || (ord($string[$i]>90))){
			$flag=false;
			break; 
		}
	}

	return $flag;
}

function solo_numeros($string){

	$flag=true;

	$tope=strlen($string);

	for ($i=0; $i<$tope;$i++){
		echo $i; 
		echo "<br>";
		echo ord($string[$i]);
		echo "<br>";
		if ((ord($string[$i])<48) || (ord($string[$i]>57))){
			$flag=false;
			break; 
		}
	}

	return $flag;
}

 function fecha_invalida($fecha){

 	$fecha = new DateTime($fecha);
	$fecha_min = new DateTime("01/01/1900");
	$fecha_max = new DateTime("now");

	date_sub($fecha_max,date_interval_create_from_date_string("16 years"));

 	if ( $fecha < $fecha_min || $fecha > $fecha_max ){
 		return true;
 	} else {
 		return false;
 	}

 }








