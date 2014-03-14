<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="libs/valida_forms.js"></script>
	<!--<script type="text/javascript" src="script/jquery.js"></script>-->

</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <header class="header_contacto">
            <h2 class="h2_empresa">CONTACTO</h2>
        </header>

        <section id="section_contacto">
            <form action="envia.php" method="post" name="form_contacto" id="form_contacto" onsubmit="return validacion_contacto()">
                <span id="titulo_contacto">Deja un mensaje</span>
                <div class="campos">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" maxlength="100">
                    <input type="text" name="compañia" id="compañia" placeholder="Compañia" maxlength="100">
                    <input type="email" name="email" id="email" placeholder="E-mail" maxlength="100">
                </div>
                <div class="campos">
                    <input type="tel" name="telefono" id="tel" placeholder="Telefono" maxlength="100">
                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" maxlength="100">
                    <input type="url" name="web" id="web" placeholder="Sitio Web (opcional)" maxlength="100">
                </div>
                <div>
                    <textarea id="mensaje_contacto" name="mensaje" placeholder="Escribe tu mensaje aqui" maxlength="2000"></textarea>
                </div>
                <div>
                    <input type="submit" value="Enviar" id="submit_contacto">
                </div>
            </form>
        </section>
    </div>
    <?php require_once("views/footer.html"); ?>

</body>
</html>