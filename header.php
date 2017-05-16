	<header class="main-header" >				
		
		<img src="images/logo.jpg" alt="logotipo" class="logo">					
		
		<div class="main-nav">

		
			<div class="main-login">  <!-- Abre Menu Registro/Login Principal-->
		      <ul class="bar-login">
		      	  <?php if(!isset($_SESSION['email'])): ?>		      	  	
		              <li><a href="ingresar.php">Ingresar</a></li>              
		          <?php endif; ?>
		          <?php if(isset($_SESSION['email'])): ?>
		              <li><a href="php/cerrarSesion.controller.php">Cerrar Sesion</a></li>
		          <?php endif; ?>	
		          <?php if(isset($_SESSION['nombre'])): ?>          	
		              <li>Bienvenido <?php echo $_SESSION['nombre']; ?></li>
		          <?php endif; ?>  		          	                  
		      </ul>
		    </div>  <!-- Cierra Menu Registro/Login Principal-->

			
			<nav>
				<ul class="bar-nav">
					<li class="icono"><a href="main.php">&#xf015</a></li>
					<li class="descripcion"><a href="#">Productos</a></li>
					<li class="descripcion"><a href="#">Servicios</a></li>
					<li class="descripcion"><a href="#">Nosotros</a></li>
					<li class="descripcion"><a href="#">Contacto</a></li>
					<li class="icono"><a href="faq.php">&#xf128</a></li>				
					<li class="icono"><a href="#">&#xf002</a></li>	
					<li class="icono"><a href="#">&#xf07a</a></li>					
				</ul>
			</nav>

		</div>

	</header>




