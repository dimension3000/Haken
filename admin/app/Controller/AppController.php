<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $theme = "Cakestrap";

    /*public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'users','action'=>'index'),
            'logoutRedirect'=>array('controller'=>'users','action'=>'index'),
            'authError'=>'Acceso restringido',
            'authorize'=>array('Controller')
        )
    );

    //Permisos
    public function isAuthorized($user){
        return true;
    }

    public function beforeFilter(){
        $this->Auth->allow('index','view');
        $this->set('logIn',$this->Auth->loggedIn());
    }*/

    public function beforeFilter(){
        parent::beforeFilter();
        if( $this->request->action !='login'&& !$this->Session->check('User')){
            $this->Session->setFlash('Lo sentimos, tienes que iniciar sesion','error');
            $this->redirect(array(
                'controller'=>'Users',
                'action'=>'login'
            ));
        }
    }

}
