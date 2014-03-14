<script type="text/javascript">

        /*$(document).ready(function(){

            var url = window.location.pathname;
            var seccion;

            $('ul.nav>li').on('click',function(){
                seccion = $(this).attr('id').toLowerCase();
            });

            var regex = new RegExp("/"+seccion+"/");
            if(regex.test(url)){
                $('ul.nav>li').removeClass('active');
                $('#'+seccion).addClass('active');
            }

        });*/

</script>

<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li id="home"">
            <a style="background-color: #66757F;" href="/haken14/admin"><img src="app/webroot/img/logo.png" width="35" height="35" style="margin-right: 10px;">HAKEN</a>
        </li>
        <li id="slider">
            <!--<a href="/hakencms/users">Usuarios</a>-->
            <?php echo $this->Html->link('Imagenes Index', array('controller'=>'imagesSlider', 'action'=>'index')); ?>
        </li>
        <li id="users">
            <!--<a href="/hakencms/users">Usuarios</a>-->
            <?php echo $this->Html->link('Usuarios', array('controller'=>'users', 'action'=>'index')); ?>
        </li>
        <li id="products">
            <!--<a href="/hakencms/products">Productos</a>-->
            <?php echo $this->Html->link('Productos', array('controller'=>'products', 'action'=>'index')); ?>
        </li>
        <li id="proyects">
            <!--<a href="/hakencms/proyects">Proyectos</a>-->
            <?php echo $this->Html->link('Proyectos', array('controller'=>'proyects', 'action'=>'index')); ?>
        </li>
        <li id="news">
            <!--<a href="/hakencms/news">Noticias</a>-->
            <?php echo $this->Html->link('Noticias', array('controller'=>'news', 'action'=>'index')); ?>
        </li>
        <li id="files">
            <a href="/haken14/admin/files/index">Archivos</a>
        </li>
    </ul>
</div>

<!--/span-->
