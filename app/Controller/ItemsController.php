<?php

class ItemsController extends AppController
{
    public $name = 'Items';
    public $uses = array('Item', 'Category');

    public function tolist()
    {
        $this->set('items', $this->Item->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                $this->Flash->success(__('Item salva com sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Item não pode ser salvo, tente novamente!'));
        }

        $this->set('categories', $this->Category->find('list'));
    }

    public function edit($id = null) 
    {
        $this->Item->id = $id; 
        if(!$this->Item->exists()){
            throw new NotFoundException(__('Item não foi encontrado em nossa base de dados.'));
        }

        if($this->request->is(array('post', 'put'))){
            if ($this->Item->save($this->request->data)) {
                $this->Flash->success(__('Item salvo com sucesso!'));
                return $this->redirect(array('action' => 'tolist')); 
            }
            $this->Flash->error(__('Item não pode ser salvo, tente novamente!'));

        } 
        
        $this->request->data = $this->Item->read();
    }

    public function delete($id)
    {
        $this->Item->id = $id; 
        if(!$this->Item->exists()){
            throw new NotFoundException(__('Item não foi encontrado em nossa base de dados.'));
        }

        if($this->Item->delete($id)){
            $this->Flash->success(__('Item desativado com sucesso!'));
            return $this->redirect(array('action' => 'tolist'));  
        }
    }

    
}
