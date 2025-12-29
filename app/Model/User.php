<?php 

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'O username é obrigatório'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A senha é obrigatória'
            )
        )
        // 'role' => array(
        //     'valid' => array(
        //         'rule' => array('inList', array('ADM', 'TEC')),
        //         'message' => 'Escolha um cargo válido',
        //         'allowEmpty' => false
        //     )
        // )
    );

    public function beforeSave($options = array())
    {
        if(isset($this->data[$this->alias]['password'])) 
        {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
}