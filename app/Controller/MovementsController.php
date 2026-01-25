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
            $this->request->data['Movement']['user_id'] = $this->Auth->user('id');
            
            try {
                $data = [
                    'id' => $this->request->data['Movement']['item_id'], 
                    'qtd_movimentada'=> $this->request->data['Movement']['quantity'], 
                ];

                $estoque = $this->Item->getEstoque($data['id']);
                if($estoque <= 0){
                    throw new Exception(__('Não há estoque suficiente para movimentação'));
                }
                                
                $data['estoque'] = $estoque;
                if(!$this->Item->diminuiEstoque($data)){
                    throw new Exception(__('Erro interno ao alterar estoque'));
                }
                
                $this->Movement->create();
                // pr($this->request->data); die();
                if (!$this->Movement->save($this->request->data)) {
                    throw new Exception(__('Erro interno ao salvar a movimentação'));
                }
                $this->Flash->success(__('Movimentação registrada sucesso!'));
            } catch (Exception $e) {
                $this->Flash->error(__($e->getMessage()));
            }

            return $this->redirect(array('action' => 'tolist'));
        }

        $this->set('locations', $this->Location->find('list'));
        $this->set('items', $this->Item->find('list'));
        //TODO: Mudar o nome da variável
        $this->set('options', array('ENT' => 'Entrada', 'SAI' => 'Saida'));
    }
}
