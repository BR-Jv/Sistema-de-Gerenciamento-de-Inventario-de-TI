<?php

class MovementsController extends AppController
{
    public $name = 'Movements';
    public $uses = array();


    public function tolist()
    {
        $this->set('movements', $this->Movement->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Movement->create();
            if ($this->Movement->save($this->request->data)) {
                $this->Flash->success(__('Movement salva com sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Movement não pode ser salvo, tente novamente!'));
        }
    }

    
}
