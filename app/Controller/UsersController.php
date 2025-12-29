<?php

class UsersController extends AppController {
    public $name = 'Users'; 
	public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function add(){
        if($this->request->is('post'))
        {
            $this->User->create();
            if($this->User->save($this->request->data))
            {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(array('action' => 'add')); //TODO - mudar o action
            }
            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
        }
    }


	public function login() {
		$this->set('title_for_layout', 'SGTI - Área de login');
        
    }
}
