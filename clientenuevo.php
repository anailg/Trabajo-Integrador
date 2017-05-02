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
		

			<div class=sign-in-container>			

				<div class="crear-cliente">
					
					<h2>Nuevo cliente</h2>

					<form action="pagina.php" method="post">

						<label for="usuario">Usuario </label> 	
						<input id="usuario" type="text" name="usuario" value="" required > 
						<br> <br>

						<label for="email">Email </label> 	
						<input id="email" type="e-mail" name="correo_electronico" value="" required > 
						<br> <br>
						
						<label for="password">Password </label> 
						<input id="password" type="password" name="password" value="" required  maxlength="20">  

						<label for="password2" >Confirmar </label>
		                <input id="password2" type="password" name="password2" value="" required maxlength="20">
		                <br> <br>              
		             
						<label for="nombre">Nombre </label>		
						<input id="nombre" type="text" name="nombre" value="" required> <br> <br>

						<label for="fechanac">Fecha de Nacimiento </label>		
						<input id="fechanac" type="date" name="fechanac" value="" required> <br> <br>

						<label for="sexo">Sexo </label>		
						<select name="sexo" >
								<option value="femenino">Femenino</option>
								<option value="masculino">Masculino</option>
						</select>
						<br> <br>

								
						<label for="direccion">Dirección </label>  	
						<input id="direccion" type="text" name="direccion" value="" required maxlength="50"> 
					
						<label for="codpostal">CP </label>  	
						<input id="codpostal" type="text" name="codpostal" value="" required maxlength="4"> <br> <br>

						<label for="localidad">Localidad </label>  	
						<input id="localidad" type="text" name="localidad" value="" required maxlength="50"> 

						<label for="provincia">Provincia </label>  	
						<select name="provincia" >
								<option value="Capital Federal">Capital Federal</option>
								<option value="Buenos Aires">Buenos Aires</option>
						</select>
						<br> <br>
						
						<button type=”submit”>Crear cuenta</button> 
					</form>

				</div>
			</div>
		</div>
		
		<?php
			include "footer.php";
		?>

	</body>

</html>
