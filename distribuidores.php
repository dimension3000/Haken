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

        <section id="distribuidores">
            <?php
            session_start();
            if(isset($_SESSION['auth'])){
                if($_SESSION['auth'] && (strcmp($_SESSION['estado'],'activo')==0 || strcmp($_SESSION['estado'],'admin')==0) ){
                    header("Location: archivos.php");
                }
                else{
                    $mensaje = 'Usuario y/o contraseña invalidos';
                    $_SESSION = array();
                    session_destroy();
                }
            }
            else {
                $mensaje = '';
            }
            ?>


            <form action="login.php" method="post" name="form_login" onsubmit="return validacion_distribuidores()">
                <div id="campos_distribuidores">
                    <input type="text" id="usuario" placeholder="USUARIO" name="name" c>
                    <input type="password" id="pass" placeholder="CONTRASEÑA" name="pass">
                    <input type="image" src="img/btn_distribuidores.png" id="boton_distribuidores">
                    <?php if(isset($mensaje)): ?>
                        <span style="color: #DB3867; padding-left: 20px; font-size: 20px; position: relative; top: 3;"><?php echo $mensaje; ?></span>
                    <?php endif; ?>
                </div>
            </form>
            <img src="img/barra_distribuidores.png" alt="" id="barra"/>
        </section>

        <header id="footer_distribuidores">
            <h3 class="h3_distribuidores">FABRICAMOS LO QUE SUEÑAS...</h3>
        </header>

        <?php require_once("views/footer.html"); ?>
    </div>


</body>
</html>