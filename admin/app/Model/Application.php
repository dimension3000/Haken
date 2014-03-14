<?php
/**
 * Created by PhpStorm.
 * User: Messoft-5
 * Date: 18/02/14
 * Time: 04:49 PM
 */
class Application extends AppModel{

    public $hasMany =array(
        'Subapplication',
        'Product'
    );

}