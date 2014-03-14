<?php

App::uses('AuthComponent','Controller/Component');

class UsersController extends AppController{

    public function index(){

        $users = $this->User->find('all');
        //pr($users);

        $this->set("users1", $users);

    }

    public function add(){

        if( $this->request->is("post")){

            if($this->User->save( $this->request->data )){
                $this->Session->setFlash('Usuario Agregado', 'success');
                $this->redirect(array('action' => 'index'));
            }
            else
                $this->Session->setFlash('Por favor verifique el formato de los datos','error');

        }

    }

    public function delete($id){
        if ($this->request->is('post')) {
            if ($this->User->delete($id)) {
                $this->Session->setFlash('El usuario con el id: ' . $id . ' ha sido eliminado', 'success');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /*public function login(){

        if( $this->request->is('post') ){

            $user = $this->User->find(
                'first',
                array('conditions'  => array(
                    'usuario'   => $this->request->data('User.usuario'),
                    'password'=> AuthComponent::password($this->request->data('User.password')),
                    'estado' => 'admin'
                    )
                )
            );

            /*debug($user);*/

            /*if($user){
                $this->Session->write('User',$user);
                $this->redirect(array(
                    'controller'=>'home',
                    'action'=> 'index'
                ));
            }

            $this->Session->setFlash('Usuario o contraseña incorrectos','error');
        }
    }*/

    /*PRUEBA SHA1 FIN (otra parte en modelo de users beforesave)*/
    public function login(){

        if( $this->request->is('post') ){

            $user = $this->User->find(
                'first',
                array('conditions'  => array(
                    'usuario'   => $this->request->data('User.usuario'),
                    'password'=> sha1($this->request->data('User.password')),
                    'estado' => 'admin'
                )
                )
            );

            //debug($user);

            if($user){
                $this->Session->write('User',$user);
                $this->redirect(array(
                    'controller'=>'home',
                    'action'=> 'index'
                ));
            }

            $this->Session->setFlash('Usuario o contraseña incorrectos','error');
        }
    }
    /*PRUEBA SHA1 FIN*/

    public function estado($id){

        $this->User->id = $id;
        $usuario = $this->User->findById($id);
        echo pr($usuario['User']['estado']);

        if(strcmp($usuario['User']['estado'],'activo') == 0){
            $this->User->saveField('estado','inactivo');
        } else {
            $this->User->saveField('estado','activo');
        }

        $this->redirect(array('action' => 'index'));

    }


    public function logout (){
        $this->Session->destroy();
    }

}