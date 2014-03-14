<?php
//Conexion
require_once('libs/db_conection.php');
//Si no se pudo conectar
if (!$con) {
    die('No pudo conectarse: ' . mysql_error());
} else {
    $proyectos = mysql_query("SELECT id,nombre FROM proyects");
}
?>

<!DOCTYPE>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

	<!--<script type="text/javascript" src="script/jquery.js"></script>-->

    <!--SLIDER-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <style type="text/css">
        /*Make sure your page contains a valid doctype at the top*/
        #simplegallery1{ //CSS for Simple Gallery Example 1
        position: relative; /*keep this intact*/
            visibility: hidden; /*keep this intact*/
            /*border: 10px solid darkred;*/
        }
        #simplegallery2 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined)
        text-align: left;
            padding: 20px 5px;
        }
    </style>

    <script type="text/javascript" src="js/simplegallery.js"></script>
    <script type="text/javascript">

        var mygallery=new simpleGallery({
            wrapperid: "simplegallery2", //ID of main gallery container,
            dimensions: [1024, 500], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
            imagearray: [
                <?php
                    //MOSTRAR IMAGENES DE PROYECTO SELECCIONADO, SI NO HA SIDO SELECCIONADO NINGUNO, MOSTRAR IMAGENES DEL PRIMER PROYECTO ENCONTRADO
                    if(isset($_GET['proyecto'])){
                        $id_proyecto = $_GET['proyecto'];
                        $imgs = mysql_query("SELECT img FROM images_proyects WHERE id_proyect = ".$id_proyecto." ");
                    }
                    else {
                        $id_proyecto = mysql_query("SELECT MIN(id_proyect) AS min FROM images_proyects");
                        $id_proyecto = mysql_fetch_array($id_proyecto);
                        $id_proyecto = $id_proyecto['min'];
                        $imgs = mysql_query("SELECT img FROM images_proyects WHERE id_proyect = (SELECT MIN(id_proyect) FROM images_proyects)");
                        header('Location: proyectos.php?proyecto='.$id_proyecto.'');
                    }
                    $proyecto = mysql_query("SELECT * FROM proyects WHERE id = ".$id_proyecto." ");
                    $proyecto = mysql_fetch_array($proyecto);
                    while($img = mysql_fetch_array($imgs))
                        /*echo '<li class="als-item"><img src="admin/app/webroot/img/proyects/'.$img['img'].'" alt="'.$img['img'].'" title="orange" width="225" height="160"/>'. $py['nombre'] .'</li>';*/
                        echo '["admin/app/webroot/img/proyects/'.$img['img'].'", "", "_new", "'.$proyecto['nombre'].'"],';

                ?>
                /*["img/slider1.jpg", "http://en.wikipedia.org/wiki/Swimming_pool", "_new", "There's nothing like a nice swim in the Summer."],
                ["img/Distribuidores.jpg", "http://en.wikipedia.org/wiki/Cave", "", ""],
                ["img/product1.jpg", "", "", "Eat your fruits, it's good for you!"],
                ["img/slider1.jpg", "", "", ""]*/
            ],
            autoplay: [true, 6000, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
            persist: false, //remember last viewed slide and recall within same session?
            fadeduration: 500, //transition duration (milliseconds)
            oninit:function(){ //event that fires when gallery has initialized/ ready to run
                //Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
            },
            onslide:function(curslide, i){ //event that fires after each slide is shown
                //Keyword "this": references current gallery instance
                //curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
                //i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
                //alert(curslide.innerHTML)
            }
        })

    </script>
    <!--FIN SLIDER-->


    <!--SLIDER 2-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <link rel="stylesheet" href="css/slider_proyectos.css">
    <script type="text/javascript" src="js/slider_proyectos.js"></script>
    <!--FIN SLIDER 2-->



</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <header class="header_proyectos">
            <h2 class="h2_empresa">PROYECTOS</h2>
        </header>

        <!--<section id="slider">
            <img src="img/slider1.jpg" />
        </section>-->

        <!--PRUEBA SLIDER-->
        <section id="slider">
            <div id="simplegallery2"></div>
            <!--INFO PROYECTO-->
            <div id="info_proyecto" style="margin: 10px 0px; border-top: 2 solid #DFE1E5; border-bottom: 2 solid #DFE1E5; padding: 10 0">
                <h2><?php echo $proyecto['nombre']; ?></h2>
                <div id="descripcion_proyecto">
                    <?php echo $proyecto['descripcion']; ?>
                    <div id="compartir_proyecto">
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
            </div>
            <!--FIN INFO PROYECTO-->
        </section>
        <!--FIN PRUEBA SLIDER-->



        <!--PRUEBA SLIDER 2-->
        <section id="proyects">

            <div id="h_proyects">
                <span>PROYECTOS</span>
            </div>

            <div class="als-container" id="slider2">
                <span class="als-prev"><img src="img/slider_proyectos_left.png" alt="prev" title="previous" /></span>
                <div class="als-viewport">
                    <ul class="als-wrapper">

                        <?php
                        $ban = 0;
                        mysql_data_seek($proyectos, 0);
                        while($py = mysql_fetch_array($proyectos)){
                            $imgs = mysql_query("SELECT img FROM images_proyects WHERE id_proyect = ".$py['id']." ");
                            $img = mysql_fetch_array($imgs);
                            if(isset($_GET['proyecto'])){
                                if($py['id']!=$_GET['proyecto'])
                                echo '<li class="als-item"><a href="?proyecto='. $py['id'] .'"><img src="admin/app/webroot/img/proyects/'.$img['img'].'" alt="'.$img['img'].'" title="orange" width="225" height="160"/>'. $py['nombre'] .'</a></li>';
                            } else
                                echo '<li class="als-item"><a href="?proyecto='. $py['id'] .'"><img src="admin/app/webroot/img/proyects/'.$img['img'].'" alt="'.$img['img'].'" title="orange" width="225" height="160"/>'. $py['nombre'] .'</a></li>';
                            $ban++;
                        }
                        ?>

                        <!--<li class="als-item"><img src="img/proyecto1.jpg" alt="orange" title="orange" width="225" height="160"/>proyecto1</li>
                        <!--<li class="als-item"><img src="img/product1.jpg" alt="orange" title="orange" width="225" height="160"/>orange</li>
                        <!--<li class="als-item"><img src="img/product2.jpg" alt="apple" title="apple" width="225" height="160"/>apple</li>
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
                    autoscroll: "no"//,
                    //interval: 4000
                });
            });
        </script>
        <!--FIN PRUEBA SLIDER 2-->

        <?php require_once("views/footer.html"); ?>
    </div>

</body>
</html>