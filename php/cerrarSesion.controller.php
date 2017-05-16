<?php

session_start(); 

//echo 'Hola! estoy en cerrar sesion'; echo"<br>";

//var_dump($_SESSION) ;echo"<br>";
//var_dump($_COOKIE) ; echo"<br>";

setcookie('email', '', -1, '/');    // Destruye la Cookie
setcookie('nombre', '', -1, '/');

//$_COOKIE['email']='';
//var_dump($_COOKIE) ;echo"<br>";

$_SESSION=array();

session_destroy();// Destruye la session

header('Location:../main.php');

?>
