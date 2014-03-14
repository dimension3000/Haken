<?php

class ImagesProduct extends AppModel{

    public $hasMany =array(
        'ImagesProduct'
    );

    public $belongsTo = array(
        'Product'
    );

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter a name for the product'
        )
    );

}

?>