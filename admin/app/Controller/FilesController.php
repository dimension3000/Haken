<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 20/02/14
 * Time: 04:50 PM
 */
/*require($_SERVER['DOCUMENT_ROOT'].'/haken14/admin/app/Lib/class.upload.php');*/
App::uses("upload","Vendor");

class FilesController extends AppController{


    public function index(){

        $files = $this->File->query('SELECT * FROM files;');
        $this->set("files", $files);

    }


    public function add(){

        if($this->request->is("post")){

            $handle = new upload($_FILES['file_field']);
            if ($handle->uploaded) {
                //$this->Session->setFlash($_SERVER['DOCUMENT_ROOT']);
                $handle->file_name_body_add = '_uploaded';
                $handle->file_max_size = '10485760'; // 10MB

                //PRUEBA EXTENCION
                /*$handle->file_new_name_ext = 'txt';*/
                /*$handle->no_script = false;*/

                $handle->process($_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/files');
                if ($handle->processed) {
                    echo 'file';
                    $handle->clean();
                } else {
                    echo 'error : ' . $handle->error;
                }
            }

            if($this->File->save( $this->request->data )){
                $this->File->saveField('archivo', $handle->file_dst_name);
                $this->Session->setFlash('Se ha agregado el archivo con exito', 'success');
                $this->redirect('/files/index');
            }
            else
                $this->Session->setFlash("Error linea 46 add FilesController",'error');

        }

    }


    public function update($id) {

        $this->File->id = $id;

        if($this->request->is("post") || $this->request->is('get')){
            $this->request->data = $this->File->read();
        } else if($this->request->data) {

            if($this->File->save( $this->request->data )){
                $this->Session->setFlash('Se ha agregado el archivo con exito', 'success');
                $this->redirect('/files/index');
            }
            else
                $this->Session->setFlash("Error linea 82 update FilesController",'error');

        }

    }
    
    
    public function delete($id){
        if ($this->request->is('post')) {

            //Borrar archivo correspondiente
            $files = $this->File->query('SELECT archivo FROM files WHERE id='.$id.';');
            foreach($files as $f){
                $rutaFile = $_SERVER['DOCUMENT_ROOT'] . '/haken14/admin/app/webroot/files/' . $f['files']['archivo'];
                if (file_exists($rutaFile))
                    unlink($rutaFile);
                pr($files);
            }
            //Fin Borrar archivo correspondiente

            if ($this->File->delete($id)) {
                $this->Session->setFlash('El archivo ha sido eliminado', 'success');
                $this->redirect('/files/index');
            }

        }
    }


    public function descargarArchivo(){

        if ($this->request->is('get')) {
            $file = $this->request['url']['file'];
            $sUrlDescargas= 'webroot/files/';
            $sDocumento = $sUrlDescargas.$file;
            /*echo $sDocumento;*/

            $this->response->file(
                $sDocumento,
                array('download' => true, 'name' => $file)
            );
            return $this->response;
        }

    }

}