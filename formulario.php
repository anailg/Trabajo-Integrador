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

/*
	<?php
		include "header.php";
	?>
*/
	
	<div class=container-formulario>

		<h1>Ingresar</h1>

		<div class=sign-in-container>

			<div class="cliente-antiguo">

				<h2>Ya soy cliente</h2>

				<form action="pagina.php" method="post">
				
					<label for="email">Email</label>  <br>		
					<input id="email" type="e-mail" name="correo_electronico" value="" required> <br> <br>
					
					<label for="password">Password</label> <br>
					<input type="password" name="contraseña" value="" required>  <br><br>

					<a href="cambio-pswd.html">Olvidé mi password</a><br><br>

					<button type=”submit”>Ingresar</button> <br>

		  		</form>
		  		
		  	</div> <!-- termina cliente-antiguo -->

			<div class="cliente-nuevo">

				<h2>Soy nuevo</h2>

				<h3> Porque crear una cuenta?</h3>
				<p> Te permite hacer tus pedidos fácil y rápido </p>
				<p> Podés subscribirte para recibir novedades y recetas exclusivas</p>
				<p> Podés participar de sorteos</p>

				<div class="btn_crearcliente">
					<a href="clientenuevo.html">Crear cuenta</a> <br>
				</div> 


			</div> <!-- termina cliente-nuevo -->

			
		</div> <!-- termina container-sign-in -->
	
	</div>
	
	

</body>

</html>