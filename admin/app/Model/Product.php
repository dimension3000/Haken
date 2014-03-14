<?php

class Product extends AppModel{

    public $belongsTo = array(
        'Linea',
        'Application'
    );

    public $validate = array(
        'nombre' => array(
            'Valid nombre'=>array(
                'rule' => 'notEmpty',
                'message' => 'Es necesario el nombre del producto'
            )/*,
            'Unique'=>array(
                'rule' => 'isUnique',
                'message' => 'Ya existe'
            )*/
        )
    );

}

?>