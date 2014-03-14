<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 26/02/14
 * Time: 01:58 PM
 */
//FORZAR DESCARGA

session_start();
if(isset($_SESSION) && isset($_SESSION['auth'])){
    if(!$_SESSION['auth']){
        header("Location: distribuidores.php");
    }
} else {
    header("Location: distribuidores.php");
}

if(isset($_GET['file'])){
    $filename = $_GET['file'];

    $filepath = $_SERVER['DOCUMENT_ROOT']."haken14/admin/app/webroot/files/".$filename;

    /*echo $filepath;*/

    header("Content-Description: Descargar imagen");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/force-download");
    header("Content-Length: " . filesize($filepath));
    header("Content-Transfer-Encoding: binary");
    readfile($filepath);

}

?>