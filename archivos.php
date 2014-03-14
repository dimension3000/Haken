<?php

    //Conexion
    require_once('libs/db_conection.php');
    //Si no se pudo conectar
    if (!$con) {
        die('No pudo conectarse: ' . mysql_error());
    } else {
        $archivos = mysql_query("SELECT * FROM files");
    }

    session_start();
    if(isset($_SESSION) && isset($_SESSION['auth'])){
        if(!$_SESSION['auth']){
            header("Location: distribuidores.php");
        }
    } else {
        header("Location: distribuidores.php");
    }
?>
<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

    <script type="text/javascript" src="js/sha1.js"></script>
    <script type="text/javascript" src="libs/valida_forms.js"></script>

</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

<header class="header_distribuidores">
    <h2 class="h2_empresa">DISTRIBUIDORES</h2>
</header>

<section id="archivos">
    <table id="tabla_archivos">
        <thead>
            <th id="th1">Nombre</th>
            <th id="th2">Descripción</th>
            <th id="th3">Descargar</th>
        </thead>
        <tbody>
            <?php

            if(isset($_GET))
            while($fl = mysql_fetch_array($archivos))
                echo '<tr><td>'. $fl['nombre'] .'</td><td>'. $fl['descripcion'] .'</td><td><a style="color: #424B52;" href="bajar.php?file='.$fl['archivo'].'">Descargar<img src="img/descargar.png"/></a></td></tr>';

            ?>
        </tbody>
    </table>
</section>

<header id="footer_distribuidores">
    <h3 class="white" style="float: left; padding-left: 10px; padding-top: 4px">BIENVENIDO <?php echo $_SESSION['usuario']; ?></h3>
    <h3 style="float: right; text-decoration: underline; padding-right: 10px; padding-top: 2px;"><?php echo '<a href="logout.php" class="white"> SALIR</a>' ?></h3>
</header>


</div>
    <?php require_once("views/footer.html"); ?>

</body>
</html>