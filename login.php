<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 25/02/14
 * Time: 05:26 PM
 */

    //Conexion
    require_once('libs/db_conection.php');
    //Si no se pudo conectar
    if (!$con) {
        die('No pudo conectarse: ' . mysql_error());
    } else {

        $sql = "SELECT usuario, password, estado FROM users WHERE usuario = '".$_POST["name"]."'";
        $sqlResultado = mysql_query($sql);
        $row = mysql_fetch_array($sqlResultado);
        $contrasena = $row["password"];
        $estado = $row["estado"];

        session_start();
        $_SESSION["usuario"] = $row['usuario'];
        $_SESSION["estado"] = $estado;

        if ($contrasena == $_POST["pass"])
        {
            //establecermos la variable de sesión auth como true
            $_SESSION["auth"] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION["auth"] = false;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }

    }

?>