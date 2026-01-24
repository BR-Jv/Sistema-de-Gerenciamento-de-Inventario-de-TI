<h2>Adicionar movimentação</h2>
<?php echo $this->Html->link('add', array('controller' => 'movements', 'action' => 'add')); ?><br>


<h2>Listagem de movimentações</h2>
<?php foreach($movements as $movement){ ?>
    <?= $movement['Movement']['id']; ?>

    </br>
<?php }; ?>

