<?php 

class Movement extends AppModel {
    public $name = 'Movement';

    public $validate = array(
        //TODO: Fazer a validar dos outros campos

        'type' => array(
            'valid' => array(
                'rule' => array('inList', array('ENT', 'SAI')), 
                'message' => 'Escolha um tipo válido',
                'allowEmpty' => false
            )
        )
    );
}