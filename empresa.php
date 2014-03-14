<!DOCTYPE>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

    <!--SECCION VALORES-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).on('ready',function(){

            $('#left_article2_empresa ul li a').click(function(evento){

                evento.preventDefault();
                var classLi = $(this).attr('class');
                $('#right_article2_empresa > div').fadeOut('fast');
                $('#'+classLi).delay(210).fadeIn();

                /*Cambiando color enlace seleccionado*/
                $('.'+classLi).css('color','#5DB555');
                /*Restableciando color a negro de los otros enlaces*/
                $('a:not(.'+classLi+')').css('color','#000000');
                /*console.log(classLi);*/

            })

        })
    </script>
    <!--FIN SECCION VALORES-->


</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <header class="header_empresa">
            <h2 class="h2_empresa">QUIENES SOMOS</h2>
        </header>

        <section id="content_empresa">
            <article id="article1_empresa">
                <div id="article1_top_empresa">
                    <p>
                        En häken* queremos ser parte de tu equipo,<br/> ser parte de tu empresa; por eso ponemos a tu disposición todo nuestro equipo humano, nuestras ideas y talento para hacer que tu espacios de trabajo estén llenos de luz, de creatividad y bienestar que permitan desempeñar tu actividad en armoniía.
                    </p>
                </div>
                <div id="article1_bottom_empresa">
                    <h3>Sueña nosotros nos encargamos de su fabricación</h3>
                </div>
            </article>
            <img src="img/img1_empresa.jpg" id="img1_empresa">
        </section>

        <section id="mision_empresa">
            <div id="header_mision_empresa">
                <h2 class="h2_empresa">MISION</h2>
            </div>
            <article id="content_mision_empresa">
                <p class="white" style="height: 120px;">
                    En häken* nuestra Misión es ofrecer a nuestros clientes una solución completa en el desarrollo integral de la imagen de sus oficinas y espacios de trabjao a través de los productos y servicios que ofrecemos, es un compromiso de todos los días, es por eso que la calidad es un estilo de vida que se sustenta en la constante capacitación y desarrollo de nuestro factor humano y se demuestra en un excelente servicio.
                </p>
                <p class="blod_white"> Nuestro negocio es generar una imagen de éxito con nuestros clientes mediante el diseño y desarrollo de sus espacios de trabajo</p>
            </article>
        </section>

        <h2 id="h2_empresa">FABRICAMOS LO QUE SUEÑAS</h2>

        <section class="header_empresa">
            <h2 class="h2_empresa">VALORES</h2>
        </section>

        <div id="article2_empresa">
            <div id="left_article2_empresa">
                <ul>
                    <li><a href="#" class="honestidad"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Honestidad</a></li>
                    <li><a href="#" class="servicio"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Servicio</a></li>
                    <li><a href="#" class="vanguardia"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Vanguardia</a></li>
                    <li><a href="#" class="amistad"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Amistad</a></li>
                    <li><a href="#" class="confianza"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Confianza</a></li>
                    <li><a href="#" class="responsabilidad"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Responsabilidad</a></li>
                    <li><a href="#" class="trabajo"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Trabajo</a></li>
                    <li><a href="#" class="congruencia"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Congruencia</a></li>
                    <li><a href="#" class="verdad"><img src="img/next.png" style="margin-right: 3px; margin-bottom: 1px;"/> Verdad</a></li>
                </ul>
            </div>
            <div id="right_article2_empresa">

                <div id="honestidad">
                    <div id="content_right_article2_empresa">
                        <p>Reconocemos el valor de la honestidad, de saber que todo lo que hacemos es la búsqueda del bien para aquellos que nos rodean, para aquellos con quienes interactuamos, así como para nosotros mismo. Aquí no cabe la hipocresía; la honestidad la vivimos no solo en la cabeza sino fundamentalmente en el corazón.</p>
                    </div>
                    <div id="img_right_article2_empresa">
                        <img src="img/honestidad.png" alt="honestidad" width="510px" height="320px"/>
                    </div>
                </div>

                <div id="servicio">
                    <div id="content_right_article2_empresa">
                        <p>Sabemos que nuestro éxito, tanto personal como empresarial, está basado en el servicio, en dar en nuestro trabajo, sin tardanza ni recelo, lo que se espera de nosotros y, lo más importante, en el tiempo esperado. Es un gusto el saber que cumplimos con la expectativa de quienes con nostros interactúan.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/servicio.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="vanguardia">
                    <div id="content_right_article2_empresa">
                        <p>Buscamos siempre la innovación, al estar vigentes en el diseño y desarrollo de nuestros productos y servicios; el ofrecer a nuestros cliente los adelantes que el desarrollo tecnológico permite, sin caer en los excesos de la moda, buscando siempre la elegancia, la sencillez y la practicidad.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/vanguardia.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="amistad">
                    <div id="content_right_article2_empresa">
                        <p>Queremos ser AMIGOS, no solo entre nosotros mismos, sino de todos aquellos con quienes nos relacionamos día con día; clientes, proveedores, vecinos, todos. Saber que podemos pasar un rato agradable con todos ellos y que ellospueden contar con nosotros.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/amistad.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="confianza">
                    <div id="content_right_article2_empresa">
                        <p>Podemos hablar sin temor, podemos expresar lo que pesnamos sin miedo a ser criticados, sabiendo que sermos escuchados y que escucharemos a quienes en nosotros confíen. Podemos también ofrecer a nuestros clientes, proveedores y amigos, la seguridad de que no divulgaremos inforamación importante y que seremos serios en nuestros tratos cumpliendo aquello a lo que nos comprometemos.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/confianza.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="responsabilidad">
                    <div id="content_right_article2_empresa">
                        <p>Sabemos cumplir nuetros compromisos y todos los días trabajamos con ese afán. Somos conscientes de que, al trabajar aceptamos laresponsabilidad de cumplir todoaquello que ofrecemos, y si fallamos, afrontaremos, las consecuencias de aquello que no pudimos cumplir.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/responsabilidad.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="trabajo">
                    <div id="content_right_article2_empresa">
                        <p>Para nosotros trabajar es un privilegio, es la oportunidad de interactuar diariamente con nuestros emejantes ofreciéndoles lo mejor de nosotros; así mismo, es el camino a la superación personal.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/trabajo.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="congruencia">
                    <div id="content_right_article2_empresa">
                        <p>Reconocemos que es vital el lograr la total integración del SER con el HACER. Todos los días buscamos el que nuestras acciones coincidan contodo aquello que pensamos y que, de manera libre y voluntaría, expresarnos con nuestra forma y filosofía de vida.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/congruencia.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

                <div id="verdad">
                    <div id="content_right_article2_empresa">
                        <p>No existe relación duradera que no se sustente en la verdad, no podemos construir nada sobre unabase de mentiras, de la indole que estas sea. Es por eso que nuestro duario vivir e interactuar se sustenta en infromación verdadera.</p>
                    </div>
                    <div id="img_right_article2_empresa"><img src="img/verdad.png" alt="imagen" width="510px" height="320px"/></div>
                </div>

            </div>
        </div>

        <?php require_once("views/footer.html"); ?>
    </div>

</body>
</html>