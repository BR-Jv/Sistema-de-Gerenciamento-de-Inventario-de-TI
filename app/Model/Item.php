<?php 

class Item extends AppModel {
    public $name = 'Item';

    public $validate = array(
        'name' => array('rule' => 'notBlank'),
        'quantity' => array(
            'notBlank' => array(
                'rule' => 'notblank',
                'message' => 'Campo não pode ser vazio'
            ),
            'naturalNumber' => array(
                'rule' => 'naturalNumber',
                'message' => 'Indique um número maior que zero.'
            )
        ),
    );
}