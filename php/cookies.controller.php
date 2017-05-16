<?php
//echo 'Hola! estoy en cookie controller';echo"<br>";
//if ( isset($_SESSION['email'])){ echo "Session email is set ";echo"<br>";}
//if ( isset($_COOKIE['email'])){ echo "Cookie email is set ";echo"<br>";}
//var_dump($_COOKIE);echo"<br>";

if ( !isset($_SESSION['email']) && isset($_COOKIE['email'])) {
  $_SESSION['email'] = $_COOKIE['email'];
  //var_dump($_COOKIE);echo"<br>";
}
if ( !isset($_SESSION['nombre']) && isset($_COOKIE['nombre'])) {
  $_SESSION['nombre'] = $_COOKIE['nombre'];
}
?>
