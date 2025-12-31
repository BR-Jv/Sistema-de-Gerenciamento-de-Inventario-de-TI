<?php

class UsersController extends AppController
{
    public $name = 'Users';
    public $uses = array();

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'edit');
    }

    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(array('action' => 'add')); //TODO - mudar o action
            }
            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
        }
    }

    public function edit($id = null) {
        $this->User->id = $id; 
        if(!$this->User->exists()){
            throw new NotFoundException(__('Usuário não foi encontrado em nossa base de dados.'));
        }

        if($this->request->is(array('post', 'put'))){
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(array('action' => 'add')); //TODO - mudar o action
            }
            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));

        } 
        
        $this->request->data = $this->User->read(); //Verificar o que essa função read faz
    }


    public function delete($id){
        $this->User->id = $id; 
        if(!$this->User->exists()){
            throw new NotFoundException(__('Usuário não foi encontrado em nossa base de dados.'));
        }

        if($this->User->delete($id)){
            $this->Flash->success(__('Usuário desativado com sucesso!'));
            return $this->redirect(array('action' => 'add')); //TODO - mudar o action 
        }
    }

    public function login()
    {
        $this->set('title_for_layout', 'SGTI - Área de login');
        
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }
}
