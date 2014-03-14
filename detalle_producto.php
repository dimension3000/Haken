<?php
//Conexion
require_once('libs/db_conection.php');
//Si no se pudo conectar
if (!$con) {
    die('No pudo conectarse: ' . mysql_error());
} else {
    /*$productos = mysql_query("SELECT * FROM products");*/
    if(isset($_GET['id'])){
        $producto = mysql_query("SELECT * FROM products WHERE id = ".$_GET['id']."");
        /*mysql_data_seek($producto, 0);*/
        $p = mysql_fetch_array($producto);
        $productos = mysql_query("SELECT * FROM products WHERE application_id = ".$_GET['aplicacion']."");

        #Consultando linea de producto actual
        $linea = mysql_query("SELECT lineas.id, lineas.nombre FROM lineas, products WHERE products.id = ".$_GET['id']." AND products.linea_id = lineas.id");
        $l = mysql_fetch_array($linea);

    } else
        header("location: productos.php");
}
?>

<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

	<!--<script type="text/javascript" src="script/jquery.js"></script>-->

    <!--SLIDER 2-->
    <!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/slider_proyectos.css">
    <script type="text/javascript" src="js/slider_proyectos.js"></script>
    <!--FIN SLIDER 2-->

    <!--SELECCION DE IMAGEN PRODUCTO-->
    <script type="text/javascript">
        $(document).on('ready',function(){
            $('#imagenes_detalle img').click(function(){
                var idimg = $(this).attr('id');

                if(idimg=='img1'){
                    $('#img1').css('display','none');
                    $('#img2').css('display','inline-block');
                    $('#img3').css('display','inline-block');
                    $('#Bimg1').css('display','block');
                    $('#Bimg2').css('display','none');
                    $('#Bimg3').css('display','none');
                }

                if(idimg=='img2'){
                    $('#img1').css('display','inline-block');
                    $('#img2').css('display','none');
                    $('#img3').css('display','inline-block');
                    $('#Bimg3').css('display','none');
                    $('#Bimg2').css('display','block');
                    $('#Bimg1').css('display','none');
                }

                if(idimg=='img3'){
                    $('#img1').css('display','inline-block');
                    $('#img2').css('display','inline-block');
                    $('#img3').css('display','none');
                    $('#Bimg1').css('display','none');
                    $('#Bimg2').css('display','none');
                    $('#Bimg3').css('display','block');
                }

            })
        })
    </script>
    <!--FIN SELECCION DE IMAGEN PRODUCTO-->



</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <header class="header_producto">
            <h2 class="h2_empresa">DETALLE DEL PRODUCTO</h2>
        </header>

        <section id="slider">
            <div id="detalle_producto">
                <div id="info_detalle">
                    <div id="info_producto">
                        <h4 style="font-weight: bold;"><?php echo $p['nombre']; ?></h4>
                        <span style="font-size: 16px; font-weight: bold;">Linea: </span><a href="producto.php?linea=<?php echo $l['id']; ?>&l=<?php echo strtoupper($l['nombre']); ?>" style="text-decoration: underline; font-size: 16px; color: #19A49B;"><?php echo $l['nombre']; ?></a><br/><br/>
                        <div id="desc_producto">
                            <?php echo $p['descripcion']; ?>
                        </div>
                    </div>
                    <div id="imagenes_detalle">
                        <!--<img id="img1" src="img/product1.jpg" alt="producto" width="100" height="100" style="display: none"/>
                        <img id="img2" src="img/product2.jpg" alt="producto" width="100" height="100" style="display: inline-block"/>
                        <img id="img3" src="img/product3.jpg" alt="producto" width="100" height="100" style="display: inline-block"/>-->
                        <?php if(!empty($p['img1'])): ?>
                        <img id="img1" src="admin/app/webroot/img/products/<?php echo $p['img1']; ?>" alt="img producto" width="100" height="100" style="display: none"/>
                        <?php endif ?>
                        <?php if(!empty($p['img2'])): ?>
                        <img id="img2" src="admin/app/webroot/img/products/<?php echo $p['img2']; ?>" alt="img producto" width="100" height="100" style="display: inline-block"/>
                        <?php endif ?>
                        <?php if(!empty($p['img3'])): ?>
                        <img id="img3" src="admin/app/webroot/img/products/<?php echo $p['img3']; ?>" alt="img producto" width="100" height="100" style="display: inline-block"/>
                        <?php endif ?>
                    </div>
                </div>
                <div id="img_producto">
                    <!--<img id="Bimg1" src="img/product1.jpg" alt="producto" height="380px" style="display: block"/>
                    <img id="Bimg2" src="img/product2.jpg" alt="producto" height="380px" style="display: none"/>
                    <img id="Bimg3" src="img/product3.jpg" alt="producto" height="380px" style="display: none"/>-->
                    <?php if(!empty($p['img1'])): ?>
                    <img id="Bimg1" src="admin/app/webroot/img/products/<?php echo $p['img1']; ?>" alt="img producto" height="380px" style="display: block"/>
                    <?php endif ?>
                    <?php if(!empty($p['img2'])): ?>
                    <img id="Bimg2" src="admin/app/webroot/img/products/<?php echo $p['img2']; ?>" alt="img producto" height="380px" style="display: none"/>
                    <?php endif ?>
                    <?php if(!empty($p['img3'])): ?>
                    <img id="Bimg3" src="admin/app/webroot/img/products/<?php echo $p['img3']; ?>" alt="img producto" height="380px" style="display: none"/>
                    <?php endif ?>
                </div>
                <div id="compartir_producto">
                    <!--Compartir Facebook-->
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            var url = $(location).attr('href');
                            $('.fb-share-button').attr('data-href',url);
                        });
                    </script>
                    <div class="fb-share-button" data-href="http://developers.facebook.com/docs/plugins/" data-width="80" data-type="button"></div>
                    <!--Fin Compartir Facebook-->

                    <!--Compartir Twitter-->
                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="Haken" data-lang="es" data-count="none">Twittear</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    <!--Fin Compartir Twitter-->
                </div>
            </div>
        </section>

        <!--PRUEBA SLIDER 2-->
        <section id="proyects">

            <?php

            if(isset($_GET['aplicacion'])){
                $aplicacion = mysql_query("SELECT nombre,id FROM applications WHERE id = ".$_GET['aplicacion']."");
                $a = mysql_fetch_array($aplicacion);
            }

            ?>

            <div id="h_proyects">
                <span>PRODUCTOS <?php if(isset($a['nombre'])) echo '- '.$a['nombre']; ?></span>
            </div>

            <div class="als-container" id="slider2">
                <span class="als-prev"><img src="img/slider_proyectos_left.png" alt="prev" title="previous" /></span>
                <div class="als-viewport">
                    <ul class="als-wrapper">
                        <?php
                        $ban = 0;
                        while($product = mysql_fetch_array($productos)){
                            if(isset($_GET['id'])){
                                if($product['id']!=$_GET['id'])
                                    echo '<li class="als-item"><a href="detalle_producto.php?id='. $product['id'] .'&aplicacion='.$_GET['aplicacion'].'"><img src="admin/app/webroot/img/products/'.$product['img1'].'" alt="'.$product['nombre'].'" title="orange" width="225" height="160"/>'. $product['nombre'] .'</a></li>';
                            } else
                                echo '<li class="als-item"><a href="detalle_producto.php?id='. $product['id'] .'&aplicacion='.$_GET['aplicacion'].'"><img src="admin/app/webroot/img/products/'.$product['img1'].'" alt="'.$product['nombre'].'" title="orange" width="225" height="160"/>'. $product['nombre'] .'</a></li>';
                            $ban++;
                        }

                        ?>
                        <!--<li class="als-item"><img src="img/proyecto1.jpg" alt="orange" title="orange" width="225" height="160"/>proyecto1</li>
                        <li class="als-item"><img src="img/product1.jpg" alt="orange" title="orange" width="225" height="160"/>orange</li>
                        <li class="als-item"><img src="img/product2.jpg" alt="apple" title="apple" width="225" height="160"/>apple</li>
                        <li class="als-item"><img src="img/product3.jpg" alt="banana" title="banana" width="225" height="160"/>banana</li>
                        <li class="als-item"><img src="img/product4.jpg" alt="blueberry" title="blueberry" width="225" height="160"/>blueberry</li>
                        <li class="als-item"><img src="img/product1.jpg" alt="orange" title="orange" width="225" height="160"/>orange2</li>
                        <li class="als-item"><img src="img/product2.jpg" alt="apple" title="apple" width="225" height="160"/>apple2</li>
                        <li class="als-item"><img src="img/product3.jpg" alt="banana" title="banana" width="225" height="160"/>banana2</li>
                        <li class="als-item"><img src="img/product4.jpg" alt="blueberry" title="blueberry" width="225" height="160"/>blueberry2</li>-->
                    </ul>
                </div>
                <span class="als-next"><img src="img/slider_proyectos_right.png" alt="next" title="next" /></span>
            </div>

        </section>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#slider2").als({
                    visible_items: <?php if($ban==2) echo '1'; else echo '4'; ?>,
                    scrolling_items: 1,
                    orientation: "horizontal",
                    circular: "yes",
                    autoscroll: "no"
                    /*interval: 4000*/
                });
            });
        </script>
        <!--FIN PRUEBA SLIDER 2-->

        <?php require_once("views/footer.html"); ?>
    </div>


</body>
</html>