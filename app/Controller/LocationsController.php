<?php

class LocationsController extends AppController
{
    public $name = 'Locations';
    public $uses = array();


    public function tolist()
    {
        $this->set('locations', $this->Location->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Location->create();
            if ($this->Location->save($this->request->data)) {
                $this->Flash->success(__('Localização salva com sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Localização não pode ser salvo, tente novamente!'));
        }
    }

    public function edit($id = null) 
    {
        $this->Location->id = $id; 
        if(!$this->Location->exists()){
            throw new NotFoundException(__('Localização não foi encontrado em nossa base de dados.'));
        }

        if($this->request->is(array('post', 'put'))){
            if ($this->Location->save($this->request->data)) {
                $this->Flash->success(__('Localização salva com sucesso!'));
                return $this->redirect(array('action' => 'tolist')); 
            }
            $this->Flash->error(__('Localização não pode ser salvo, tente novamente!'));

        } 
        
        $this->request->data = $this->Location->read();
    }

    public function delete($id)
    {
        $this->Location->id = $id; 
        if(!$this->Location->exists()){
            throw new NotFoundException(__('Localização não foi encontrado em nossa base de dados.'));
        }

        if($this->Location->delete($id)){
            $this->Flash->success(__('Localização desativado com sucesso!'));
            return $this->redirect(array('action' => 'tolist'));  
        }
    }

    
}
