<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 28/02/14
 * Time: 12:30 PM
 * Eric Diaz Partida
 */

//Conexion
require_once('libs/db_conection.php');
//Si no se pudo conectar
if (!$con) {
    die('No pudo conectarse: ' . mysql_error());
} else {
    $noticias = mysql_query("SELECT * FROM news");
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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <link rel="stylesheet" href="css/slider_proyectos.css">
    <script type="text/javascript" src="js/slider_proyectos.js"></script>
    <!--FIN SLIDER 2-->

</head>
<body>

<div id="container">
    <?php require_once("views/menu.html"); ?>

    <header class="header_noticias">
        <h2 class="h2_noticias">NOTICIAS</h2>
    </header>

    <section id="detalle_noticia">
        <div id="img_noticia">
            <?php

            if(isset($_GET['noticia'])){
                $noticia = mysql_query("SELECT * FROM news WHERE id=".$_GET['noticia']."");
                $n = mysql_fetch_array($noticia);
                echo '<img src="admin/app/webroot/img/news/'.$n['img'].'" alt="'.$n['titulo'].'" width="635" height="500">';
            } else{
                $noticia = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
                $n = mysql_fetch_array($noticia);
                echo '<img src="admin/app/webroot/img/news/'.$n['img'].'" alt="'.$n['titulo'].'" width="635" height="500">';
                header('Location: noticias.php?noticia='.$n['id'].'');
            }

            ?>
        </div>
        <div id="descripcion_noticia">
            <h2 style="margin: 5 0 10 5"><?php if(isset($_GET['noticia'])) echo $n['titulo']; ?></h2>
            <div id="desc">
                <?php if(isset($_GET['noticia'])) echo $n['contenido']; ?>
                <!--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi consequatur dolores dolorum enim iusto magni maiores molestiae nisi numquam possimus provident quae quod quos rem, soluta sunt totam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aperiam atque ea, enim, facere labore laborum, perferendis quae quaerat recusandae rem repellendus repudiandae suscipit temporibus ullam vero vitae. Cumque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt doloremque eaque eveniet inventore ipsa ipsam laborum libero magnam natus neque perspiciatis placeat quisquam sequi suscipit tenetur, ut veniam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi consequatur dolores dolorum enim iusto magni maiores molestiae nisi numquam possimus provident quae quod quos rem, soluta sunt totam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aperiam atque ea, enim, facere labore laborum, perferendis quae quaerat recusandae rem repellendus repudiandae suscipit temporibus ullam vero vitae. Cumque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt doloremque eaque eveniet inventore ipsa ipsam laborum libero magnam natus neque perspiciatis placeat quisquam sequi suscipit tenetur, ut veniam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi consequatur dolores dolorum enim iusto magni maiores molestiae nisi numquam possimus provident quae quod quos rem, soluta sunt totam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aperiam atque ea, enim, facere labore laborum, perferendis quae quaerat recusandae rem repellendus repudiandae suscipit temporibus ullam vero vitae. Cumque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt doloremque eaque eveniet inventore ipsa ipsam laborum libero magnam natus neque perspiciatis placeat quisquam sequi suscipit tenetur, ut veniam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi consequatur dolores dolorum enim iusto magni maiores molestiae nisi numquam possimus provident quae quod quos rem, soluta sunt totam voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aperiam atque ea, enim, facere labore laborum, perferendis quae quaerat recusandae rem repellendus repudiandae suscipit temporibus ullam vero vitae. Cumque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt doloremque eaque eveniet inventore ipsa ipsam laborum libero magnam natus neque perspiciatis placeat quisquam sequi suscipit tenetur, ut veniam voluptatum.-->
            </div>
        </div>
    </section>

    <!--PRUEBA SLIDER 2-->
    <section id="proyects">

        <div id="h_proyects">
            <span>NOTICIAS</span>
        </div>

        <div class="als-container" id="slider2">
            <span class="als-prev"><img src="img/slider_proyectos_left.png" alt="prev" title="previous" /></span>
            <div class="als-viewport">
                <ul class="als-wrapper">

                    <?php
                    $ban = 0;
                    while($n = mysql_fetch_array($noticias)){
                        //NO MOSTRAR LA NOTICIA ACTUAL
                        if(isset($_GET['noticia'])){
                            if($n['id']!=$_GET['noticia'])
                            echo '<li class="als-item"><a href="?noticia='. $n['id'] .'"><img src="admin/app/webroot/img/news/'.$n['img'].'" alt="'.$n['titulo'].'" title="orange" width="225" height="160"/>'. $n['titulo'] .'</a></li>';
                        }
                        $ban++;
                    }
                    ?>

                    <!--<li class="als-item"><img src="img/proyecto1.jpg" alt="orange" title="orange" width="225" height="160"/>proyecto1</li>-->

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
                autoscroll: "yes",
                interval: 4000
            });
        });
    </script>
    <!--FIN PRUEBA SLIDER 2-->

    <?php require_once("views/footer.html"); ?>
</div>


</body>
</html>