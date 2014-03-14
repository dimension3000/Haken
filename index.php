<?php
//Conexion
require_once('libs/db_conection.php');
//Si no se pudo conectar
if (!$con) {
    die('No pudo conectarse: ' . mysql_error());
} else {
    $images = mysql_query("SELECT * FROM images_sliders");
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
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.js"></script>

    <style type="text/css">

        /*Make sure your page contains a valid doctype at the top*/
        #simplegallery1{ //CSS for Simple Gallery Example 1
        position: relative; /*keep this intact*/
            visibility: hidden; /*keep this intact*/
            /*border: 10px solid darkred;*/
        }

        #simplegallery1 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined)
            text-align: left;
            padding: 20px 5px;
        }

    </style>

    <script type="text/javascript" src="js/simplegallery.js"></script>

    <script type="text/javascript">

        var mygallery=new simpleGallery({
            wrapperid: "simplegallery1", //ID of main gallery container,
            dimensions: [1024, 500], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
            imagearray: [
                <?php
                    while($img = mysql_fetch_array($images)){
                        $imagen = (!empty($img['img'])) ? $img['img'] : '';
                        $enlace = (!empty($img['enlace'])) ? $img['enlace'] : '';
                        $titulo = (!empty($img['titulo'])) ? $img['titulo'] : '';
                        $titulo = $quitarespacio=str_replace('"','\"',$titulo);
                        echo '["admin/app/webroot/img/slider/'.$imagen.'", "'.$enlace.'", "_new", "'.$titulo.'"],';
                        /*echo '["admin/app/webroot/img/slider/'.$img['img'].'", "'.$img['enlace'].'", "_new", "'.$img['titulo'].'"],';*/
                        }
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


    <!--POP UP UBICACION-->
    <link rel="stylesheet" href="css/popup/magnific-popup.css"/>
    <script src="js/popup/jquery.magnific-popup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.popup').magnificPopup({
                type:'iframe',
                fixedBgPos: true
            });
        });
    </script>
    <!--FIN POP UP UBICACION-->

</head>
<body>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <!--<section id="slider">
            <img src="img/slider1.jpg" />
        </section>-->

        <!--PRUEBA SLIDER-->
        <section id="slider">
            <div id="simplegallery1"></div>
        </section>
        <!--FIN PRUEBA SLIDER-->

        <section id="contentInicio">
            <article>
                <h1>Fabricamos lo que Sueñas</h1>
                <p>
                    Sed in. Odio vut platea tincidunt sed dolor a magna porttitor sed, eros, dictumst dapibus, magnis, lacus purus in, auctor! Et nascetur? Etiam mauris! Ultrices? A nascetur. Porttitor et porttitor velit turpis odio amet augue porta? Dis mattis dignissim ut! Lorem scelerisque tincidunt ac et dis risus tristique, magna magnis magnis, hac? Cras sed, rhoncus ut nisi lorem magna. Scelerisque egestas lectus nec!
                </p>
            </article>
        </section>

        <section id="contentInicio2">
            <div id="info">
                <div id="noticias">
                    <div class="info_content">
                        <?php
                            $noticias = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 3");
                            $acum = 1;
                            while($n = mysql_fetch_array($noticias)){
                                $new[$acum] = $n;
                                $acum++;
                            }
                        ?>
                        <h2>Noticias</h2>
                        <?php if(isset($new[1])): ?>
                        <div class="noticia1">
                            <h4><?php echo $new[1]['titulo']; ?></h4>
                            <div id="p_noticia"><?php echo $new[1]['contenido']; ?></div>
                            <a href="noticias.php?noticia=<?php echo $new[1]['id']; ?>">[+] ver más</a>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($new[2])): ?>
                        <div class="noticia1">
                            <h4><?php echo $new[2]['titulo']; ?></h4>
                            <div id="p_noticia"><?php echo $new[2]['contenido']; ?></div>
                            <a href="noticias.php?noticia=<?php echo $new[2]['id']; ?>">[+] ver más</a>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($new[3])): ?>
                        <div class="noticia2">
                            <h4><?php echo $new[3]['titulo']; ?></h4>
                            <div id="p_noticia"><?php echo $new[3]['contenido']; ?></div>
                            <a href="noticias.php?noticia=<?php echo $new[3]['id']; ?>">[+] ver más</a>
                        </div>
                        <?php endif; ?>
                        <!--<div class="noticia1">
                            <h4>11/Febrero/2014</h4>
                            <p>bla blabla bla bla hjkjhk aahajk sskj dkdjhd kakjhsñ kjdkdjh </p>
                            <a href="#noticias">[+] ver más</a>
                        </div>
                        <div class="noticia1">
                            <h4>11/Febrero/2014</h4>
                            <p>bla blabla bla bla hjkjhk aahajk sskj dkdjhd kakjhsñ kjdkdjh </p>
                            <a href="#noticias">[+] ver más</a>
                        </div>
                        <div class="noticia2">
                            <h4>11/Febrero/2014</h4>
                            <p id="p_noticia">bla blabla bla bla hjkjhk aahajk sskj dkdjhd kakjhsñ kjdkdjh fsdf sfgsdfg dfg sdfg sdfg sdfg dfgsdgh hghj jhfdg</p>
                            <a href="#noticias">[+] ver más</a>
                        </div>-->
                    </div>
                </div>
                <div id="ubicacion">
                    <div class="info_content">
                        <h2>Ubicacion</h2>
                        <div class="noticia1">
                            <h4>Fabrica + showroom GDL</h4>
                            <p>Periférico Sur No. 617<br/>
                               Zapopan, Jal. Méx. C.P. 45010<br/>
                               Tel. (33) 3627 + 3327</p>
                            <a class="popup" href="views/popup_showroom.html">[+] ver más</a>
                        </div>
                        <div class="noticia1">
                            <h4>Organitec GDL</h4>
                            <p>Agustín Yañez No. 2667<br/>
                                Guadalajara, Jal. Méx. C.P. 44120<br/>
                                Tel. (33) 3616 + 1876</p>
                            <a class="popup" href="views/popup_organitec.html">[+] ver más</a>
                        </div>
                        <div class="noticia2">
                            <h4>Merida</h4>
                            <p>Calle 3 No. 271 Local 5<br/>
                                Mérida. Yc. Méx. C.P. 9120<br/>
                                Tel. (999) 948 + 4000</p>
                            <a class="popup" href="views/popup_merida.html">[+] ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="facebook">
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/Haken/149147748447698?fref=ts" data-width="340" data-height="475" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>
        </section>

        <div style="height: 5px; clear: both;"></div>
        <?php require_once("views/footer.html"); ?>
    </div>



</body>
</html>