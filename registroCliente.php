<?php 

	session_start();

	$titulo_error='';
	
	$error['email']='';	
	$error['password']='';
	$error['nombre']='';
	$error['apellido']='';
	$error['sexo']='';
	$error['fechanac']='';
	$error['direccion']='';
	$error['codpostal']='';
	$error['localidad']='';
	$error['provincia']='';

	$input_value['email']='';
	$input_value['password']='';
	$input_value['nombre']='';
	$input_value['apellido']='';
	$input_value['sexo']='';
	$input_value['fechanac']='';
	$input_value['direccion']='';
	$input_value['codpostal']='';
	$input_value['localidad']='';
	$input_value['provincia']='';
	

	if (isset($_SESSION['titulo_error'])) {
		$titulo_error=$_SESSION['titulo_error'];
	}

	if (isset($_SESSION['mensajes_error'])) {
		$error=$_SESSION['mensajes_error'];	
	}

	if (isset($_SESSION['cliente'])) {
		$input_value=$_SESSION['cliente'];
	}

	$_SESSION = array();

?>


<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Cooking Company - Sign-In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins">	
	</head>

	<body>

		<?php
			include "header.php";
		?>


		<div class=container-formulario>

		
			<h1>Crear cuenta</h1>

			<div class=crear-cliente-container>	
				
				<?php 
				  	if (!($titulo_error=='')) {
				  		echo "<div class='mensaje-error'>
				  		 		  <h3>$titulo_error</h3>
							  </div>";
				  	}			
				?>		

				<div class="crear-cliente">
							
					<h2>Nuevo cliente</h2>


					<form class="form-alta" action="php/cliente.controller.php" method="post" 					
						  enctype="multipart/form-data">

						<label for="email">Email </label> 	
						<?php 
							echo "<input id='email' type='e-mail' name='email' 
							       value='".$input_value['email']."'' required /> ";
						?>
						<span class='error'><?php echo($error['email']); ?></span>
						<br> <br>
						
						<label for="password">Password </label> 
						<input id="password" type="password" name="password" value=""  maxlength="20">
						
						<label for="password2" >Confirmar </label>
		                <input id="password2" type="password" name="password2" value=""  maxlength="20">
		                <br>  
		                <span class='error'><?php echo($error['password']); ?></span>
		                <br>             
		             
						<label for="nombre">Nombre </label>		
						<?php 
							echo "<input id='nombre' type='text' name='nombre' 
								   value='".$input_value['nombre']."' required maxlength='20'>" 
						?>
						
						<label for="apellido">Apellido </label>	
						<?php 
							echo "<input id='apellido' type='text' name='apellido' 
								   value='".$input_value['apellido']."' required maxlength='30'>" 
						?>	
						<br>						
						<span class='error'><?php echo($error['nombre'].'  '); ?></span>
						<span class='error'><?php echo($error['apellido']); ?></span> 
						<br>

						<label for="avatar">Imagen perfil </label>		
						<input id="avatar" type="file" name="avatar" value="" > <br> <br>						

						<label for="sexo">Sexo </label>		
						<select name="sexo" >
								<option value="femenino">Femenino</option>
								<option value="masculino">Masculino</option>
						</select>
						
						<label for="fechanac">Fecha de Nacimiento </label>		
						<?php 
							echo "<input id='fechanac' type='date' name='fechanac' 
								   value='".$input_value['fechanac']."' >" 
						?>	
						<br> 
						<span class='error'><?php echo($error['sexo'].'  '); ?></span>
						<span class='error'><?php echo($error['fechanac']); ?></span> 
						<br>
								
						<label for="direccion">Dirección</label>  	

						<?php 
							echo "<input id='direccion' type='text' name='direccion' 
								   value='".$input_value['direccion']."' required maxlength='100'>" 
						?>	
						
						<label for="codpostal">Codigo Postal </label> 
						<?php 
							echo "<input id='codpostal' type='text' name='codpostal' 
								   value='".$input_value['codpostal']."' required maxlength='8'>" 
						?>	
						<br>
						<span class='error'><?php echo($error['direccion'].'  '); ?></span>
						<span class='error'><?php echo($error['codpostal']); ?></span> 
						<br>

						<label for="localidad">Localidad </label>  	
						<?php 
							echo "<input id='localidad' type='text' name='localidad' 
								   value='".$input_value['localidad']."' required maxlength='50'>" 
						?>	 

						<label for="provincia">Provincia </label>  	
						<select name="provincia" >
								<option value="Capital Federal">Capital Federal</option>
								<option value="Buenos Aires">Buenos Aires</option>
						</select>
						<br>
						<span class='error'><?php echo($error['localidad'].'  '); ?></span>
						<span class='error'><?php echo($error['provincia']); ?></span> 
						<br>
						
						<div class='botones'>
							<!--<button name='reset' type='reset'>Reset</button> -->
							<button name='registrar' type='submit'>Crear cuenta</button>
						</div> 

					</form>

				</div>
			</div>
		</div>
		
		<?php
			include "footer.php";
		?>

	</body>

</html>
