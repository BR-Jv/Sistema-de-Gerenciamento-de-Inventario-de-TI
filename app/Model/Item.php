<?php 

class Item extends AppModel {
    public $name = 'Item';

    //TODO: Fazer validação para a categoria
    public $validate = array(
        'name' => array('rule' => 'notBlank'),
        'quantity' => array(
            'notBlank' => array(
                'rule' => 'notblank',
                'message' => 'Campo não pode ser vazio'
            ),
            'naturalNumber' => array(
                'rule' => 'naturalNumber',
                'message' => 'Indique um número maior que zero.'
            )
        ),
    );

    /**
     * Consulta o estoque do item
     *
     * @param int $id ID do item.
     * @return int Retorna a quantidade em estoque 
     */
    public function getEstoque(int $id){
        $sql_quantity_stock = "SELECT i.quantity FROM items i WHERE i.id = $id";
        return Hash::get($this->query($sql_quantity_stock), '0.0.quantity');
    }


    public function diminuiEstoque(array $data){
        try {
            $id = $data['id'];
            $newQuantity = $data['estoque'] - $data['qtd_movimentada'];
            $sql = "UPDATE items SET quantity = $newQuantity WHERE id = $id";
            $this->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
}