<?php

require_once('db_info.php');

$con = mysql_connect($host,$usuario,$contraseña) or die("No se pudo conectar con la bd".mysql_error());
mysql_select_db($db,$con) or die("No se pudo conectar a la BD".mysql_error());
//mysql_database($db,$con);

//Escojer la codificacion de los datos traidos de la BD
@mysql_query("SET NAMES 'utf8'");
?>