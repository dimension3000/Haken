<!-- topbar starts -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/haken14/admin/home"><img src="app/webroot/img/logo.png" width="20" height="20" style="margin-right: 10px;">HAKEN</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php $s = $this->Session->read('User'); echo $s['User']['usuario']; echo " "; ?> <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout'),array('tabindex'=>'-1')); ?>
                                <!--<a tabindex="-1" href="../user/logout">Logout</a>-->
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <!--<li>
                        <a href="/hakencms">Home</a>
                    </li>-->
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle">Usuarios <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <!--<a href="/hakencms/users">Ver Lista</a>-->
                                <?php echo $this->Html->link('Ver Lista', array('controller'=>'users', 'action'=>'index')); ?>
                            </li>
                            <li>
                                <!--<a href="/hakencms/users/add">Agregar Usuario</a>-->
                                <?php echo $this->Html->link('Agregar Usuario', array('controller'=>'users', 'action'=>'add')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Productos <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/products">Ver Productos</a>-->
                                <?php echo $this->Html->link('Ver Productos', array('controller'=>'products', 'action'=>'index')); ?>
                            </li>
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/products/add">Agregar Nuveo</a>-->
                                <?php echo $this->Html->link('Agregar Nuevo', array('controller'=>'products', 'action'=>'add')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Proyectos <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/proyects">Ver Lista</a>-->
                                <?php echo $this->Html->link('Ver Lista', array('controller'=>'proyects', 'action'=>'index')); ?>
                            </li>
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/proyects/add">Agregar Nuevo Proyecto</a>-->
                                <?php echo $this->Html->link('Agregar Nuevo Proyecto', array('controller'=>'proyects', 'action'=>'add')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Noticias <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/news">Ver Noticias</a>-->
                                <?php echo $this->Html->link('Ver Noticias', array('controller'=>'news', 'action'=>'index')); ?>
                            </li>
                            <li>
                                <!--<a tabindex="-1" href="/hakencms/news/add">Agregar Noticia</a>-->
                                <?php echo $this->Html->link('Agregar Noticia', array('controller'=>'news', 'action'=>'add')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Archivos <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="/haken14/admin/files/index">Ver Archivos</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/haken14/admin/files/add">Agregar Archivo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                    <?php echo $this->Html->link('Imagenes Index', array('controller'=>'imagesSlider', 'action'=>'index')); ?>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- topbar ends -->