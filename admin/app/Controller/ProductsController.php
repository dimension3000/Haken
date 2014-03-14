<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 18/02/14
 * Time: 04:19 PM
 */
/*require($_SERVER['DOCUMENT_ROOT'].'/haken14/admin/app/Lib/class.upload.php');*/
App::uses("upload","Vendor");

class ProductsController extends AppController{

    //Helper necesario para utilizar ajax en la accion consulta()
    public $helpers = array('Js');

    //Funcion especificada como ajax
    public function consulta(){

        /*$category_id = $this->request->data['Post']['category_id'];*/
        /*$aplicacion = $this->Product->Application->find('list', array('fields' => 'Application.nombre'));*/
        $aplicacion_id = $this->request->data['Product']['application_id'];

        /*$subcategories = $this->Product->Application->Subapplication->find('list', array(
            'conditions' => array('Subapplication.id_aplicacion' => $aplicacion_id),
            'fields' => array('Subapplication.id_aplicacion', 'Subapplication.nombre')
        ));*/

        $subcategories = $this->Product->query("SELECT id,nombre FROM subapplications WHERE subapplications.id_aplicacion =".$aplicacion_id.";");

        $this->set('subcategories',$subcategories);
        $this->layout = 'ajax';
    }

    public function index(){

        $products = $this->Product->query("
            SELECT l.nombre, a.nombre, s.nombre, p.nombre, p.descripcion, p.img1, p.img2, p.img3, p.id
            FROM products AS p
            Left JOIN lineas AS l ON (p.linea_id = l.id)
            Left JOIN applications AS a ON (p.application_id = a.id)
            Left JOIN subapplications AS s ON (p.subapplication_id = s.id)
        ");
        //pr($products);

        $this->set("products", $products);

    }

    public function add(){

        //Campo de categorias en vista add
        $lineas = $this->Product->Linea->find('list', array('fields' => 'Linea.nombre'));
        //Pasando variable a la vista
        $this->set('lineas',$lineas);

        //Campo de categorias en vista add (el id se envia para ser usado posterior en action consulta con ajax)
        $aplicacion = $this->Product->Application->find('list', array('fields' => array('Application.id','Application.nombre')));
        //Pasando variable a la vista
        $this->set('applications',$aplicacion);

        if( $this->request->is("post")){

            for($count=1;$count<=3;$count++){

                if(/*$_FILES['image_field'.$count] != null*/!empty($_FILES['image_field'.$count])){
                $handle = new upload($_FILES['image_field'.$count]);
                if ($handle->uploaded) {
                    //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                    $handle->file_new_name_body   = 'image_resized';

                    /*$handle->image_resize         = true;
                    $handle->image_ratio_crop = true;
                    $handle->image_y              = 385;
                    $handle->image_x              = 500;*/

                    $handle->image_resize         = true;
                    $handle->image_ratio_fill      = true;
                    $handle->image_y              = 380;
                    $handle->image_x              = 500;

                    /*$img_size = getimagesize($_FILES['tmp_name']);
                    if($img_size[0]>$img_size[1]){
                        #if($img_size[0]>450){
                        $handle->image_resize         = true;
                        $handle->image_x              = 450;
                        $handle->image_ratio_y        = true;
                        #} else
                        #$handle->image_resize         = false;
                    } else {
                        #if($img_size[1]>290){
                        $handle->image_resize         = true;
                        $handle->image_y              = 290;
                        $handle->image_ratio_x        = true;
                        #} else
                        #   $handle->image_resize         = false;
                    }*/

                    $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products');
                    if ($handle->processed) {
                        //echo 'image resized';
                        $handle->clean();
                    } else {
                        echo 'error : ' . $handle->error;
                    }
                }
                //$imagen_size = getimagesize($_FILES['tmp_name']);
                /*$urlImage = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products/' . $handle->file_dst_name;*/
                $nameImage[$count] = $handle->file_dst_name;
                unset($handle);
                }

            }

            if($this->Product->save( $this->request->data )){
                $this->Product->saveField('img1', $nameImage[1]);
                $this->Product->saveField('img2', $nameImage[2]);
                $this->Product->saveField('img3', $nameImage[3]);
                $this->Session->setFlash('Producto Agregado', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash("Data don't have the required format",'error');

        }

    }

    public function delete($id){
        if ($this->request->is('post')) {

            //Borrar imagenes correspondiente
            $product = $this->Product->findById($id);
            $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products/' . $product['Product']['img1'];
            $rutaImagen2 = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products/' . $product['Product']['img2'];
            $rutaImagen3 = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products/' . $product['Product']['img3'];
            if (file_exists($rutaImagen) && !empty($product['Product']['img2']) )
                unlink($rutaImagen);
            if (file_exists($rutaImagen2) && !empty($product['Product']['img2']) )
                unlink($rutaImagen2);
            if (file_exists($rutaImagen3) && !empty($product['Product']['img2']) )
                unlink($rutaImagen3);
            //Fin Borrar imagenes correspondiente

            if ($this->Product->delete($id)) {
                $this->Session->setFlash('El Producto Ha Sido Eliminado', 'success');
                $this->redirect(array('action' => 'index'));
            }

        }
    }

    public function update($id) {

        //Campo de categorias en vista add
        $lineas = $this->Product->Linea->find('list', array('fields' => 'Linea.nombre'));
        //Pasando variable a la vista
        $this->set('lineas',$lineas);

        //Campo de categorias en vista add (el id se envia para ser usado posterios en action consulta con ajax)
        $aplicacion = $this->Product->Application->find('list', array('fields' => array('Application.id','Application.nombre')));
        //Pasando variable a la vista
        $this->set('applications',$aplicacion);

        //Campo de categorias en vista add (el id se envia para ser usado posterios en action consulta con ajax)
        $subaplicacion = $this->Product->query('SELECT s.nombre FROM subapplications AS s, products AS p  WHERE p.id = '.$id.' AND p.subapplication_id = s.id');
        //Pasando variable a la vista
        $this->set('subapplications',$subaplicacion);

        //Campo de categorias en vista add (el id se envia para ser usado posterios en action consulta con ajax)
        $imagenes = $this->Product->query('SELECT img1,img2,img3 FROM products WHERE id = '.$id);
        //Pasando variable a la vista
        $this->set('imagenes',$imagenes);

        $this->Product->id = $id;
        if ($this->request->is('post')) {
            $this->request->data = $this->Product->read();
        } else {

            for($count=1;$count<=3;$count++){

                if(/*$_FILES['image_field'.$count] != null*/ !empty($_FILES['image_field'.$count]) ){
                    $handle = new upload($_FILES['image_field'.$count]);
                    if ($handle->uploaded) {
                        //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                        $handle->file_new_name_body   = 'image_resized';

                        /*$handle->image_resize         = true;
                        $handle->image_ratio_crop = true;
                        $handle->image_y              = 380;
                        $handle->image_x              = 500;*/

                        $handle->image_resize         = true;
                        $handle->image_ratio_fill      = true;
                        $handle->image_y              = 380;
                        $handle->image_x              = 500;

                        /*$img_size = getimagesize($_FILES['tmp_name']);
                        if($img_size[0]>$img_size[1]){
                            #if($img_size[0]>450){
                            $handle->image_resize         = true;
                            $handle->image_x              = 450;
                            $handle->image_ratio_y        = true;
                            #} else
                            #$handle->image_resize         = false;
                        } else {
                            #if($img_size[1]>290){
                            $handle->image_resize         = true;
                            $handle->image_y              = 290;
                            $handle->image_ratio_x        = true;
                            #} else
                            #   $handle->image_resize         = false;
                        }*/

                        $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products');
                        if ($handle->processed) {
                            //echo 'image resized';
                            $handle->clean();
                        } else {
                            echo 'error : ' . $handle->error;
                        }
                    }

                    if(strcmp($handle->file_dst_name,"")){
                        //Borrar imagen correspondiente
                        $product = $this->Product->findById($id);
                        $rutaImagen[$count] = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/products/' . $product['Product']['img'.$count];
                        if (file_exists($rutaImagen[$count]))
                            unlink($rutaImagen[$count]);
                        //Fin Borrar imagen correspondiente
                        $this->Product->saveField('img'.$count, $handle->file_dst_name);
                    }

                    unset($handle);
                }

            }

            if($this->Product->save( $this->request->data )){
                $this->Session->setFlash('Producto Modificado Correctamente', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash("Data don't have the required format",'error');

        }
    }
    
}