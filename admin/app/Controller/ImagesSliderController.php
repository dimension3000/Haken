<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 28/02/14
 * Time: 11:27 AM
 */
App::uses("upload","Vendor");

class ImagesSliderController extends AppController{

    public function index(){

        $images = $this->ImagesSlider->query('SELECT * FROM images_sliders;');
        $this->set("images", $images);

    }

    public function add(){

        if( $this->request->is("post")){

            if($_FILES['image_field'] != null){
                $handle = new upload($_FILES['image_field']);
                if ($handle->uploaded) {
                    //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                    $handle->file_new_name_body   = 'image_resized';

                    //$img_size = getimagesize($_FILES['tmp_name']);
                    /*if($img_size[0]>$img_size[1]){*/
                        //if($img_size[0]<1024){
                        $handle->image_resize         = true;
                        $handle->image_ratio_crop = true;
                        $handle->image_y              = 500;
                        $handle->image_x              = 1024;
                        //}


                    $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/slider');
                    if ($handle->processed) {
                        echo 'image resized';
                        $handle->clean();
                    } else {
                        echo 'error : ' . $handle->error;
                    }
                }
                $nameImage = $handle->file_dst_name;
            }

            if($this->ImagesSlider->save( $this->request->data )){
                $this->ImagesSlider->saveField('img', $nameImage);
                $this->Session->setFlash('Imagen Agregada', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash("Error Add Images Slider ",'error');
        }
    }

    public function delete($id){
        if ($this->request->is('post')) {

            //Borrar imagenes correspondiente
            $img = $this->ImagesSlider->findById($id);
            $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/slider/' . $img['ImagesSlider']['img'];
            if (file_exists($rutaImagen))
                unlink($rutaImagen);
            //Fin Borrar imagenes correspondiente

            if ($this->ImagesSlider->delete($id)) {
                $this->Session->setFlash('La Imagen Ha Sido Eliminada', 'success');
                $this->redirect(array('action' => 'index'));
            }

        }
    }

}