<?php

class MovementsController extends AppController
{
    public $name = 'Movements';
    public $uses = array('Movement', 'Item', 'Location');

    public function tolist()
    {   
        $this->set('movements', $this->Movement->find('all'));

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Movement->create();
            $this->request->data['Movement']['user_id'] = $this->Auth->user('id');
            //TODO:Melhorar o sistema de erro
            if ($this->Movement->save($this->request->data)) {
                $this->Flash->success(__('Movimentação registrada sucesso!'));
                return $this->redirect(array('action' => 'tolist'));
            }
            $this->Flash->error(__('Movimentação não registrada, entre em contato com o suporte!'));
        }

        $this->set('locations', $this->Location->find('list'));
        $this->set('items', $this->Item->find('list'));
        //TODO: Mudar o nome da variável
        $this->set('options', array('ENT' => 'Entrada', 'SAI' => 'Saida'));
    }

    
}
