<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 21/02/14
 * Time: 12:02 PM
 */
/*require($_SERVER['DOCUMENT_ROOT'].'/haken14/admin/app/Lib/class.upload.php');*/
App::uses("upload","Vendor");

class NewsController extends AppController{


    public function index(){

        $news = $this->News->find('all');
        $this->set("news", $news);

    }

    public function add(){

        if( $this->request->is("post")){

                if(!empty($_FILES['image_field'])){
                    $handle = new upload($_FILES['image_field']);
                    if ($handle->uploaded) {
                        //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                        $handle->file_new_name_body   = 'image_resized';

                        $handle->image_resize         = true;
                        $handle->image_ratio_crop = true;
                        $handle->image_y              = 500;
                        $handle->image_x              = 634;
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

                        $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/news');
                        if ($handle->processed) {
                            //echo 'image resized';
                            $handle->clean();
                        } else {
                            echo 'error : ' . $handle->error;
                        }
                    }
                    $nameImage = $handle->file_dst_name;
                }

            if($this->News->save( $this->request->data )){
                $this->News->saveField('img', $nameImage);
                $this->Session->setFlash('Noticia Agregada', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash("Error Add News ",'error');

        }

    }

    public function delete($id){
    if ($this->request->is('post')) {

        //Borrar imagenes correspondiente
        $new = $this->News->findById($id);
        $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/news/' . $new['News']['img'];
        if (file_exists($rutaImagen))
            unlink($rutaImagen);
        //Fin Borrar imagenes correspondiente

        if ($this->News->delete($id)) {
            $this->Session->setFlash('La Noticia Ha Sido Eliminada', 'success');
            $this->redirect(array('action' => 'index'));
        }

    }
}

    public function update($id) {

        $this->News->id = $id;

        //Campo de categorias en vista add (el id se envia para ser usado posterios en action consulta con ajax)
        $img = $this->News->query('SELECT img FROM news WHERE id = '.$id);
        //Pasando variable a la vista
        $this->set('img',$img);

        if ($this->request->is('post')) {
            $this->request->data = $this->News->read();
        } else {

            if(!empty($_FILES['image_field'])){
                $handle = new upload($_FILES['image_field']);
                if ($handle->uploaded) {
                    //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                    $handle->file_new_name_body   = 'image_resized';

                    $handle->image_resize         = true;
                    $handle->image_ratio_crop = true;
                    $handle->image_y              = 500;
                    $handle->image_x              = 634;
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

                    $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/news');
                    if ($handle->processed) {
                        //echo 'image resized';
                        $handle->clean();
                    } else {
                        echo 'error : ' . $handle->error;
                    }
                }
                $nameImage = $handle->file_dst_name;
            }

            if(strcmp($nameImage,"")){
                //Borrar imagen correspondiente
                $new = $this->News->findById($id);
                $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/news/' . $new['News']['img'];
                if (file_exists($rutaImagen))
                    unlink($rutaImagen);
                //Fin Borrar imagen correspondiente
                $this->News->saveField('img', $nameImage);
            }

            if($this->News->save( $this->request->data )){
                $this->Session->setFlash('Noticia Modificada Correctamente', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash("Data don't have the required format",'error');

        }

    }

}