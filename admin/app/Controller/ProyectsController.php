<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 20/02/14
 * Time: 11:40 AM
 */

require($_SERVER['DOCUMENT_ROOT'].'/haken14/admin/app/Lib/class.upload.php');
/*App::uses("upload","Vendor");*/

class ProyectsController extends AppController{

    public function index(){
        $imagenes_proyectos = $this->Proyect->query('SELECT id_proyect,img FROM proyects LEFT JOIN images_proyects ON (images_proyects.id_proyect = proyects.id)');
        $this->set("imgs", $imagenes_proyectos);

        $proyectos = $this->Proyect->query('SELECT * FROM proyects;');
        $this->set("proyects", $proyectos);
    }


    public function add(){

        //Proximo Id en productos en caso de ser insertado
        $query=$this->Proyect->query("select AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='messoft_haken' and TABLE_NAME='proyects';");
        $id=$query[0]['TABLES']['AUTO_INCREMENT'];

        if($this->request->is("post")){

            //Subir imagenes
            if(isset($_FILES['file'])) {

                //Agregar proyecto
                if($this->Proyect->save( $this->request->data )){

                    //PRUEBA
                    $files = array();
                    foreach ($_FILES['file'] as $k => $l) {
                        foreach ($l as $x => $v) {
                            if (!array_key_exists($x, $files))
                                $files[$x] = array();
                            $files[$x][$k] = $v;
                        }
                    }

                    foreach ($files as $file) {
                        $handle = new Upload($file);
                        if ($handle->uploaded) {
                            $handle->file_new_name_body   = 'image_resized';

                            //$img_size = getimagesize($_FILES['tmp_name']);
                            /*if($img_size[0]>$img_size[1]){
                                //if($img_size[0]>450){
                                $handle->image_resize         = true;
                                $handle->image_x              = 450;
                                $handle->image_ratio_y        = true;
                                //} else
                                //$handle->image_resize         = false;
                            } else {
                                //if($img_size[1]>290){
                                $handle->image_resize         = true;
                                $handle->image_y              = 290;
                                $handle->image_ratio_x        = true;
                                //} else
                                //  $handle->image_resize         = false;
                            }*/
                            $handle->image_resize         = true;
                            $handle->image_ratio_crop = true;
                            $handle->image_y              = 500;
                            $handle->image_x              = 1024;

                            $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/proyects');
                            if ($handle->processed) {
                                echo 'OK';
                            } else {
                                echo 'Error: ' . $handle->error;
                            }
                        } else {
                            echo 'Error: ' . $handle->error;
                        }


                        $nameImage = $handle->file_dst_name;
                        $urlImage = $handle->file_src_pathname;
                        if($nameImage!='')
                            $this->Proyect->query("INSERT INTO images_proyects (id_proyect, img) VALUES('$id','$nameImage');");

                        unset($handle);
                    }

                    //Imagen que sera mostrada en index de categoria (en este caso la ultima en agregarse);
                    /*$this->Proyect->saveField('imgName', $nameImage);*/
                    if($this->Proyect->save( $this->request->data )){
                        $this->Session->setFlash('Proyecto Agregado', 'success');
                        $this->redirect(array('action' => 'index'));
                    }
                    else
                        $this->Session->setFlash("Los datos no tienen el formato requerido",'error');

                }
                else
                    $this->Session->setFlash('Los datos no tienen el formato requerido','error');

            }
        }

    }


    public function deleteImg($id){

        if ($this->request->is('get')) {

            //Borrar imagen
            $img = $this->Proyect->query('SELECT * FROM images_proyects WHERE id='.$id.';');
            $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/Proyects/' . $img[0]['images_proyects']['img'];
            if (file_exists($rutaImagen))
                unlink($rutaImagen);
            //Fin Borrar imagen

            //Borrar de la bd
            /*if ($this->Product->delete($id)) {*/
            $this->Proyect->query('DELETE FROM images_proyects WHERE id='.$id.';');
            $this->Session->setFlash('Imagen Eliminada', 'success');
            $this->redirect(array('controller'=>'proyects','action'=>'update',$img[0]['images_proyects']['id_proyect']));
           /* }*/

        }

    }

    public function update($id){



        $this->Proyect->id = $id;

        // Imagenes del proyecto
        $imgs = $this->Proyect->query('SELECT * FROM images_proyects WHERE id_proyect='.$id.';');
        $this->set('images', $imgs);

        //Encontrar proyecto por el id
        $proyecto = $this->Proyect->findById($id);
        //Enviando a la vista
        $this->set('p',$proyecto);

        if($this->request->is("post") || $this->request->is('get')){
            $this->request->data = $this->Proyect->read();
        } else if($this->request->data) {

            //Subir imagenes
            if(isset($_FILES['file'])) {

                //Agregar proyecto
                if($this->Proyect->save( $this->request->data )){

                    //PRUEBA
                    $files = array();
                    foreach ($_FILES['file'] as $k => $l) {
                        foreach ($l as $x => $v) {
                            if (!array_key_exists($x, $files))
                                $files[$x] = array();
                            $files[$x][$k] = $v;
                        }
                    }

                    foreach ($files as $file) {
                        $handle = new Upload($file);
                        if ($handle->uploaded) {
                            $handle->file_new_name_body   = 'image_resized';

                            /*$img_size = getimagesize($_FILES['tmp_name']);
                            if($img_size[0]>$img_size[1]){
                                //if($img_size[0]>450){
                                $handle->image_resize         = true;
                                $handle->image_x              = 450;
                                $handle->image_ratio_y        = true;
                                //} else
                                //$handle->image_resize         = false;
                            } else {
                                //if($img_size[1]>290){
                                $handle->image_resize         = true;
                                $handle->image_y              = 290;
                                $handle->image_ratio_x        = true;
                                //} else
                                //  $handle->image_resize         = false;
                            }*/
                            $handle->image_resize         = true;
                            $handle->image_ratio_crop = true;
                            $handle->image_y              = 500;
                            $handle->image_x              = 1024;

                            $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/proyects');
                            if ($handle->processed) {
                                echo 'OK';
                            } else {
                                echo 'Error: ' . $handle->error;
                            }
                        } else {
                            echo 'Error: ' . $handle->error;
                        }


                        $nameImage = $handle->file_dst_name;
                        $urlImage = $handle->file_src_pathname;
                        if(strcmp($nameImage,"")!=0)
                        $this->Proyect->query("INSERT INTO images_proyects (id_proyect, img) VALUES('$id','$nameImage');");

                        unset($handle);
                    }

                    //Imagen que sera mostrada en index de categoria (en este caso la ultima en agregarse);
                    /*$this->Proyect->saveField('imgName', $nameImage);*/
                    if($this->Proyect->save( $this->request->data )){
                        $this->Session->setFlash('Proyecto Modificado Correctamente', 'success');
                        $this->redirect(array('action' => 'index'));
                    }
                    else
                        $this->Session->setFlash("Los datos no tienen el formato requerido",'error');

                }
                else
                    $this->Session->setFlash('Los datos no tienen el formato requerido','error');

            }

        }

    }


    public function delete($id){
        if ($this->request->is('post')) {

            //Borrar imagen correspondiente
            $imgs = $this->Proyect->query('SELECT id_proyect,img FROM proyects LEFT JOIN images_proyects ON (images_proyects.id_proyect = proyects.id) WHERE images_proyects.id_proyect = '.$id.';');
            foreach($imgs as $images){
                $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/img/proyects/' . $images['images_proyects']['img'];
                if (file_exists($rutaImagen))
                    unlink($rutaImagen);
                //echo pr($images);
            }

            //Fin Borrar imagen correspondiente

            if ($this->Proyect->delete($id)) {
                $this->Session->setFlash('EL proyecto ha sido eliminado', 'success');
                $this->redirect(array('controller'=>'Proyects', 'action' => 'index'));
            }

        }
    }

}