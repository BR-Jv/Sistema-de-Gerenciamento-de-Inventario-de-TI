<?php

class UsersController extends AppController
{
    public $name = 'Users';
    public $uses = array();

    public function tolist()
    {
        // $this->User->recursive = 0;
        // $this->set('users', $this->paginate());
        $this->set('users', $this->User->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
        }
    }

    //! Toda vez que faço a edição a senha é criptografada novamente, verificar isso. 
    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário não foi encontrado em nossa base de dados.'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
        }

        $this->request->data = $this->User->read(); //! Verificar o que essa função read faz
    }

    //* Alterar a lógica para deixar o usuário inativo e não deletar de fato.
    public function delete($id)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário não foi encontrado em nossa base de dados.'));
        }

        if ($this->User->delete($id)) {
            $this->Flash->success(__('Usuário desativado com sucesso!'));
            return $this->redirect(array('action' => 'tolist'));
        }
    }

    public function login()
    {
        $this->set('title_for_layout', 'SGTI - Área de login');

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Nome ou senha estão incorretos'));
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
