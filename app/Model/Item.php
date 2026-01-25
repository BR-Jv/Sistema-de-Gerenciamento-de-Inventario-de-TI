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
     * COnsulta a quantidade de itens no estoque
     *
     * Busca a quantidade atual do item diretamente no banco de dados e compara
     * se é suficiente para cobrir a quantidade solicitada na movimentação.
     *
     * @param int $id ID do item.
     * @param int $movement_quantity Quantidade que se deseja retirar ou movimentar.
     * @return bool Retorna TRUE se houver estoque suficiente (estoque >= demanda), caso contrário FALSE.
     */
    public function getQuantity(int $id){
        $sql_quantity_stock = "SELECT i.quantity FROM items i WHERE i.id = $id";
        return Hash::get($this->query($sql_quantity_stock), '0.0.quantity');
    }


    public function diminuiEstoque(int $id, int $newQuantity){
        try {
            $sql = "UPDATE items SET quantity = $newQuantity WHERE id = $id";
            $this->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
}