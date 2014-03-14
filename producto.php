<?php
//Conexion
require_once('libs/db_conection.php');
//Si no se pudo conectar
if (!$con) {
    die('No pudo conectarse: ' . mysql_error());
} else {
    /*$productos = mysql_query("SELECT * FROM products");*/
    if(isset($_GET)){
        if(isset($_GET['aplicacion']) && isset($_GET['subaplicacion'])){
            //CONSULTA DE PRODUCTOS DE UNA SUBAPLICACION
            $productos = mysql_query("SELECT * FROM products p WHERE p.subapplication_id=".$_GET['subaplicacion']."");
        } else if(isset($_GET['aplicacion']) && !isset($_GET['subaplicacion'])){
            //CONSULTA DE PRODUCTOS DE UNA APLICACION
            $productos = mysql_query("SELECT * FROM products p WHERE p.application_id=".$_GET['aplicacion']."");
        } else if(isset($_GET['linea'])){
            //CONSULTA DE PRODUCTOS DE UNA LINEA
            $productos = mysql_query("SELECT * FROM products p WHERE p.linea_id=".$_GET['linea']."");
        } else
            header("location: productos.php");
    } else
        header("location: productos.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!--<meta charset="iso-8859-1">-->
    <meta charset="utf-8">
	<title>Haken</title>
    <link rel="stylesheet" href="css/styles.css">

    <!--DATATABLES COMO PAGINADOR-->
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/paginador_tablas.js"></script>
    <link rel="stylesheet" href="css/paginador_tablas.css">
    <script type="text/javascript">
        $(document).on('ready',function(){

            /*$('tbody tr:odd', $('#table_productos')).hide();*/ //hiding rows for test
            var options = {
                currPage : 1,
                optionsForRows : [3,4,5],
                rowsPerPage : 3/*,
                firstArrow : (new Image()).src="./images/firstBlue.gif",
                prevArrow : (new Image()).src="./images/prevBlue.gif",
                lastArrow : (new Image()).src="img/slider_proyectos_left.png",
                nextArrow : (new Image()).src="img/slider_proyectos_right.png"*/
        }
        $('#table_productos').tablePagination(options);

        })

    </script>
    <!--FIN DATATABLES COMO PAGINADOR-->

</head>
<body>

    <div id="container">
        <?php require_once("views/menu.html"); ?>

        <div id="menu_productos">
            <ul id="linea_ul">
                <li id="linea_name" <?php if(isset($_GET['aplicacion'])) if($_GET['aplicacion']==5 || $_GET['aplicacion']==6 || $_GET['aplicacion']==7) echo 'style="width: 100% !important;"' ?> class="white">
                    <span id="head_linea">
                        <?php

                        if(isset($_GET['aplicacion']) && isset($_GET['subaplicacion'])){
                            //CONSULTA DE PRODUCTOS DE UNA SUBAPLICACION
                            echo $_GET['s'];
                        } else if(isset($_GET['aplicacion']) && !isset($_GET['subaplicacion'])){
                            //CONSULTA DE PRODUCTOS DE UNA APLICACION
                            echo $_GET['a'];
                        } else if(isset($_GET['linea'])){
                            //CONSULTA DE PRODUCTOS DE UNA LINEA
                            echo $_GET['l'];
                        } else
                            header("location: productos.php");

                        ?>
                    </span>
                    <div id="regresar"><a href="productos.php"><img id="img_regresar" src="img/prev.png">REGRESAR</a></div>
                </li>
                <?php

                //MOSTRANDO MENU LATERAL DE ACUERDO A LO SELECCIONADO EN EL MENU DE PRODUCTOS
                if(isset($_GET['aplicacion']) && isset($_GET['subaplicacion'])){
                    echo '<li><a href="producto.php?a='.$_GET['a'].'&aplicacion='.$_GET['aplicacion'].'" id="a_linea_menu">'.$_GET['a'].'<img id="img_icono" src="img/icono1.png" alt=""></a>';
                    $subApp = mysql_query("SELECT * FROM subapplications s WHERE s.id_aplicacion=".$_GET['aplicacion']."");
                    echo '<ul>';
                    while($s = mysql_fetch_array($subApp)){
                        echo '<li><a href="producto.php?a='.$_GET['a'].'&s='.$s['nombre'].'&aplicacion='.$_GET['aplicacion'].'&subaplicacion='.$s['id'].'">'.$s['nombre'].'</a></li>';
                    }
                    echo '</ul>';
                } else if(isset($_GET['aplicacion']) && !isset($_GET['subaplicacion'])){

                    //EXCEPCION SI LA APLICACION NO TIENE NINGUNA SUBCATEGORIA (NO SE MOSTRARIA EL MENU LATERAL EN producto.php)
                    if($_GET['aplicacion']!=5 && $_GET['aplicacion']!=6 && $_GET['aplicacion']!=7){

                    echo '<li><a href="producto.php?a='.$_GET['a'].'&aplicacion='.$_GET['aplicacion'].'" id="a_linea_menu">'.$_GET['a'].'<img id="img_icono" src="img/icono1.png" alt=""></a>';
                    $subApp = mysql_query("SELECT * FROM subapplications s WHERE s.id_aplicacion=".$_GET['aplicacion']."");
                    echo '<ul>';
                    while($s = mysql_fetch_array($subApp)){
                        echo '<li><a href="producto.php?a='.$_GET['a'].'&s='.$s['nombre'].'&aplicacion='.$_GET['aplicacion'].'&subaplicacion='.$s['id'].'">'.$s['nombre'].'</a></li>';
                    }
                    echo '</ul>';

                    }

                } else if(isset($_GET['linea'])){
                    echo '<li><a href="#" id="a_linea_menu">LINEAS<img id="img_icono" src="img/icono1.png" alt=""></a>';
                    $lineas = mysql_query("SELECT * FROM lineas");
                    echo '<ul>';
                    while($l = mysql_fetch_array($lineas)){
                        echo '<li><a href="producto.php?linea='.$l['id'].'&l='.$l['nombre'].'">'.$l['nombre'].'</a></li>';
                    }
                    echo '</ul>';
                } else
                    header("location: productos.php");

                ?>
                <!--<li><a href="#" id="a_linea_menu">LÍNEAS<img id="img_icono" src="img/icono1.png" alt=""></a>
                    <ul>
                        <li><a href="#">SOFÁS</a></li>
                        <li><a href="#">SILLERÍA</a></li>
                        <li><a href="#">MUEBLE METÁLICO</a></li
                        <li><a href="#">MAMPARAS</a></li>
                        <li><a href="#">SOFÁS</a></li>
                        <li><a href="#">SILLERÍA</a></li>
                        <li><a href="#">MUEBLE METÁLICO</a></li>
                    </ul>
                </li>-->
            </ul>
        </div>

    <table id="table_productos">
        <thead>

        </thead>
<tbody>
        <?php

        $acumulador = 0;
        while($p = mysql_fetch_array($productos)){

            if($acumulador==0 || $acumulador%4==0)
                echo '<tr>';

            if(!empty($p['img1']))
                echo '<td><a href="detalle_producto.php?id='.$p['id'].'&aplicacion='.$p['application_id'].'"><img src="admin/app/webroot/img/products/'.$p['img1'].'" alt="'.$p['nombre'].'" width="226" height="216">'.$p['nombre'].'</a></td>';
            else if(!empty($p['img2']))
                echo '<td><a href="detalle_producto.php?id='.$p['id'].'&aplicacion='.$p['application_id'].'"><img src="admin/app/webroot/img/products/'.$p['img2'].'" alt="'.$p['nombre'].'" width="226" height="216">'.$p['nombre'].'</a></td>';
            else if(!empty($p['img3']))
                echo '<td><a href="detalle_producto.php?id='.$p['id'].'&aplicacion='.$p['application_id'].'"><img src="admin/app/webroot/img/products/'.$p['img3'].'" alt="'.$p['nombre'].'" width="226" height="216">'.$p['nombre'].'</a></td>';
            else
                echo "ERROR IMAGEN DE PRODUCTO: ".$p['nombre'];

            if($acumulador%4==0 && $acumulador!=0)
                echo '</tr>';

            $acumulador++;
        }
        if($acumulador<4 || !$acumulador%4==0)
            echo '</tr>';

        ?>
        <!--<tr>
            <td><img src="img/product1.jpg" alt="producto 1" width="226" height="216">Producto 1ó</td>
            <td><img src="img/product2.jpg" alt="producto 2" width="226" height="216">Producto 2</td>
            <td><img src="img/product3.jpg" alt="producto 3" width="226" height="216">Otro producto</td>
            <td><img src="img/product4.jpg" alt="producto 4" width="226" height="216">silla resistente</td>
        </tr>
        <tr>
            <td><img src="img/product1.jpg" alt="producto 1" width="226" height="216">Producto 1</td>
            <td><img src="img/product2.jpg" alt="producto 2" width="226" height="216">Producto 2</td>
            <td><img src="img/product3.jpg" alt="producto 3" width="226" height="216">Otro producto</td>
            <td><img src="img/product4.jpg" alt="producto 4" width="226" height="216">silla resistente</td>
        </tr>
        <tr>
            <td><img src="img/product1.jpg" alt="producto 1" width="226" height="216">Producto 1</td>
            <td><img src="img/product2.jpg" alt="producto 2" width="226" height="216">Producto 2</td>
            <td><img src="img/product3.jpg" alt="producto 3" width="226" height="216">Otro producto</td>
            <td><img src="img/product4.jpg" alt="producto 4" width="226" height="216">silla resistente</td>
        </tr>
        <tr>
            <td><img src="img/product2.jpg" alt="producto 1" width="226" height="216">Producto 1</td>
            <td><img src="img/product2.jpg" alt="producto 2" width="226" height="216">Producto 2</td>
            <td><img src="img/product4.jpg" alt="producto 3" width="226" height="216">Otro producto</td>
            <td><img src="img/product4.jpg" alt="producto 4" width="226" height="216">silla resistente</td>
        </tr>
        <tr>
            <td><img src="img/product1.jpg" alt="producto 1" width="226" height="216">Producto 1</td>
            <td><img src="img/product1.jpg" alt="producto 2" width="226" height="216">Producto 2</td>
            <td><img src="img/product1.jpg" alt="producto 3" width="226" height="216">Otro producto</td>
            <td><img src="img/product4.jpg" alt="producto 4" width="226" height="216">silla resistente</td>
        </tr>-->
</tbody>
    </table>


    </div>

    <?php require_once("views/footer.html"); ?>

</body>
</html>
