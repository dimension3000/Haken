<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


    <!--EFECTO ACORDEON SLIDER-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/acordeon/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="js/acordeon/jquery.accordionImageMenu.min.js"></script>
    <link rel="stylesheet" href="css/acordeon/accordionImageMenu.css" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('#acc-menu').AccordionImageMenu({
                'openDim': 800,
                'closeDim': 144,
                'height': 605
            });
        });
    </script>
    <!--FIN ACORDEON SLIDER-->


</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <div id="menu_productos">
            <ul>
                <li><a href="producto.php?a=MUEBLES&aplicacion=1">MUEBLES<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="producto.php?a=MUEBLES&s=RECEPCIÓN Y SALAS DE ESPERA&aplicacion=1&subaplicacion=2">RECEPCIÓN Y SALAS DE ESPERA</a></li>
                        <li><a href="producto.php?a=MUEBLES&s=OFICINAS DIRECTIVAS&aplicacion=1&subaplicacion=3">OFICINAS DIRECTIVAS</a></li>
                        <li><a href="producto.php?a=MUEBLES&s=ÁREAS DE TRABAJO Y SEMIEJECUTIVOS&aplicacion=1&subaplicacion=4">ÁREAS DE TRABAJO Y SEMIEJECUTIVOS</a></li>
                        <li><a href="producto.php?a=MUEBLES&s=SALAS DE JUNTA Y CAPACITACIÓN&aplicacion=1&subaplicacion=5">SALAS DE JUNTA Y CAPACITACIÓN</a></li>
                        <li><a href="producto.php?a=MUEBLES&s=AREAS DE GUARDADO&aplicacion=1&subaplicacion=6">AREAS DE GUARDADO</a></li>
                        <li><a href="producto.php?a=MUEBLES&s=COCINETAS Y COMEDORES&aplicacion=1&subaplicacion=7">COCINETAS Y COMEDORES</a></li>
                    </ul>
                </li>
                <li><a href="producto.php?a=MAMPARAS&aplicacion=2">MAMPARAS<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="producto.php?a=MAMPARAS&s=VETRO&aplicacion=2&subaplicacion=8">VETRO</a></li>
                        <li><a href="producto.php?a=MAMPARAS&s=QUADRATO&aplicacion=2&subaplicacion=9">QUADRATO</a></li>
                    </ul>
                </li>
                <li><a href="producto.php?a=SOFÁS&aplicacion=3">SOFÁS<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="producto.php?a=SOFÁS&s=TERRA&aplicacion=3&subaplicacion=10">TERRA</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=AQUA&aplicacion=3&subaplicacion=11">AQUA</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=AIRE&aplicacion=3&subaplicacion=12">AIRE</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=FRIDA&aplicacion=3&subaplicacion=13">FRIDA</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=ARENA&aplicacion=3&subaplicacion=14">ARENA</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=QUADRO&aplicacion=3&subaplicacion=15">QUADRO</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=TORINO&aplicacion=3&subaplicacion=16">TORINO</a></li>
                        <li><a href="producto.php?a=SOFÁS&s=OTTOMAN&aplicacion=3&subaplicacion=17">OTTOMAN</a></li>
                    </ul>
                </li>
                <li><a href="producto.php?a=SILLERÍA&aplicacion=4">SILLERÍA<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="producto.php?a=SILLERÍA&s=OPERATIVAS&aplicacion=4&subaplicacion=18">OPERATIVAS</a></li>
                        <li><a href="producto.php?a=SILLERÍA&s=EJECUTIVAS&aplicacion=4&subaplicacion=19">EJECUTIVAS</a></li>
                        <li><a href="producto.php?a=SILLERÍA&s=COLECTIVIDAD Y VISITA&aplicacion=4&subaplicacion=20">COLECTIVIDAD Y VISITA</a></li>
                        <li><a href="producto.php?a=SILLERÍA&s=BANCAS&aplicacion=4&subaplicacion=21">BANCAS</a></li>
                    </ul>
                </li>
                <li><a href="producto.php?a=MUEBLE METALICO&aplicacion=5">MUEBLE METÁLICO</a></li>
                <li style="position: relative; top: 1px;"><a href="producto.php?a=RACK INDUSTRIAL Y ANAQUELES&aplicacion=6" style=" padding-top: 11px; padding-bottom: 8px;">RACK INDUSTRIAL Y ANAQUELES</a></li>
                <li><a href="producto.php?a=ACCESORIOS&aplicacion=7">ACCESORIOS</a></li>
                <li><a href="#">LÍNEAS<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="producto.php?linea=1&l=HAKEN">HAKEN</a></li>
                        <li><a href="producto.php?linea=2&l=LITE">LITE</a></li>
                        <li><a href="producto.php?linea=3&l=MOTION">MOTION</a></li>
                        <li><a href="producto.php?linea=4&l=PLANO 4">PLANO 4</a></li>
                        <li><a href="producto.php?linea=5&l=TRA-B">TRA-B</a></li>
                        <li><a href="producto.php?linea=6&l=ARAK">ARAK</a></li>
                        <li><a href="producto.php?linea=7&l=PRISMA">PRISMA</a></li>
                        <li><a href="producto.php?linea=8&l=TRÍA">TRÍA</a></li>
                        <li><a href="producto.php?linea=9&l=BASIC">BASIC</a></li>
                        <li><a href="producto.php?linea=10&l=GUARDADO">GUARDADO</a></li>
                        <li><a href="producto.php?linea=11&l=MESAS">MESAS</a></li>
                        <li><a href="producto.php?linea=12&l=VETRO">VETRO (MAMPARAS)</a></li>
                        <li><a href="producto.php?linea=13&l=QUATRO">QUATRO (MAMPARAS)</a></li>
                        <li><a href="producto.php?linea=14&l=TERRA">TERRA</a></li>
                        <li><a href="producto.php?linea=15&l=AQUA">AQUA</a></li>
                        <li><a href="producto.php?linea=16&l=AIRE">AIRE</a></li>
                        <li><a href="producto.php?linea=17&l=FRIDA">FRIDA</a></li>
                        <li><a href="producto.php?linea=18&l=ARENA">ARENA</a></li>
                        <li><a href="producto.php?linea=19&l=QUADRO">QUADRO</a></li>
                        <li><a href="producto.php?linea=20&l=TORINO">TORINO</a></li>
                        <li><a href="producto.php?linea=41&l=OTTOMAN">OTTOMAN</a></li>
                        <li><a href="producto.php?linea=42&l=SILLAS OPERATIVAS">SILLAS OPERATIVAS</a></li>
                        <li><a href="producto.php?linea=43&l=SILLAS EJECUTIVAS">SILLAS EJECUTIVAS</a></li>
                        <li><a href="producto.php?linea=44&l=SILLAS COLECTIVIDAD Y VISITA">SILLAS COLECTIVIDAD Y VISITA</a></li>
                        <li><a href="producto.php?linea=45&l=BANCAS">BANCAS</a></li>
                        <li><a href="producto.php?linea=46&l=METALÍCO">METALÍCO</a></li>
                        <li><a href="producto.php?linea=47&l=RACK INDUSTRIAL Y ANAQUELES">RACK INDUSTRIAL Y ANAQUELES</a></li>
                        <li><a href="producto.php?linea=48&l=ACCESORIOS">ACCESORIOS</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!--<div id="slider_productos">
            <img src="img/img_products.jpg" alt="slider">
        </div>-->

        <!--PRUEBA ACORDEON-->
        <div id="slider_productos">
            <!--<script>horinit_doc('',0);</script>-->
            <ul id='acc-menu'>
                <li><a href='producto.php?a=MUEBLES&aplicacion=1'><span>MUEBLES</span><img src='img/productos/muebles.jpg' /></a></li>
                <li><a href='producto.php?a=MAMPARAS&aplicacion=2'><span>MAMPARAS</span><img src='img/productos/mampara.jpg'></a></li>
                <li><a href='producto.php?a=SOFÁS&aplicacion=3'><span>SOFÁS</span><img src='img/productos/sofa.jpg' /></a></li>
                <li><a href='producto.php?a=SILLERÍA&aplicacion=4'><span>SILLERÍA</span><img src='img/productos/silleria.jpg' /></a></li>
                <li><a href='producto.php?a=MUEBLE METÁLICO&aplicacion=5'><span>MUEBLE METÁLICO</span><img src='img/productos/metalico.jpg' /></a></li>
                <li><a href='producto.php?a=RACK INDUSTRIAL Y ANAQUELES&aplicacion=6'><span>RACK INDUSTRIAL Y ANAQUELES</span><img src='img/productos/racks.jpg' /></a></li>
                <li><a href='producto.php?a=ACCSESORIOS&aplicacion=7'><span>ACCESORIOS</span><img src='img/productos/accesorios.jpg' /></a></li>
            </ul>
        </div>
        <!--FIN PRUEBA ACORDEON-->

        <?php require_once("views/footer.html"); ?>
    </div>
</body>
</html>