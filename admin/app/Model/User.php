<?php

App::uses('AuthComponent','Controller/Component');


class User extends AppModel{

    public $validate = array(
        'usuario' => array(
            'rule' => 'notEmpty',
            'message' => 'Please write your name'
        ),
        'password' => array(
            'betwen'=> array(
                'rule' => array('between',5,15),
                'message' => 'Please enter a password between 5 and 10 characters'
            ),
            'Match passwords'=> array(
                'rule'=>'matchPasswords',
                'message' => 'Passwords do not match'
            )
        ),
        'password_confirmation' => array(
            'rule' => array('between',5,15),
            'message' => 'The password must be at least 5 characters'
        )
    );

    public function matchPasswords($data){
        if($data['password']==$this->data['User']['password_confirmation']){
            return true;
        }
        $this->invalidate('password_confirmation','Passwords do not match');
        return false;
    }

    /*public function beforeSave( $options = array() ){
        if(isset($this->data['User']['password'])){
            $this->data['User']['password']= AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }*/

    /*PRUEBA SHA1 (otra parte en users controller login)*/
    public function beforeSave( $options = array() ){
        if(isset($this->data['User']['password'])){
            $this->data['User']['password']= sha1($this->data['User']['password']);
        }
        return true;
    }
    /*PRUEBA SHA1 FIN*/

}

?>