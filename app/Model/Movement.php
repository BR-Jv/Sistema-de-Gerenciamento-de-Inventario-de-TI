<?php 

App::uses('Item', 'Model');

class Movement extends AppModel {
    public $name = 'Movement';

    public $validate = array(
        //TODO: Fazer a validação dos outros campos
        
        'quantity' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A senha é obrigatória'
            )
        ),
        'type' => array(
            'valid' => array(
                'rule' => array('inList', array('ENT', 'SAI')), 
                'message' => 'Escolha um tipo válido',
                'allowEmpty' => false
            )
        )
    );
    
    //* Ao salvar uma movimentação deve ser atualizado o estoque do item que foi movimentado 

    //TODO: Preciso ajeitar a data da movimentação que está sendo salva no DB
    public function beforeSave($options = array())
    {
        $item = new Item();

        $item_id = $this->data['Movement']['item_id'];
        $movement_quantity = $this->data['Movement']['quantity'];

        $stock_quantity = $item->getQuantity($item_id);
        if(!$stock_quantity){
            //! Aqui deve retornar uma mensagem avisando que não quantidade de stock cadastrada
            return false;
        }
            
        if($stock_quantity < $movement_quantity){
            //! Aqui deve retornar uma mensagem avisando que não tem quantidade de estoque para movimentar 
            return false;
        }
                
        $new_stock_quantity = $stock_quantity - $movement_quantity; 
        
        $item->diminuiEstoque($item_id, $new_stock_quantity); 
        if(!$item->diminuiEstoque($item_id, $new_stock_quantity)) {
            return false;
        }

        return true;
    }
    
    

}