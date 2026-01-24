<div class="users form">
<?php echo $this->Form->create('Movement'); ?>
    <!--O user_id vai vir da session-->
    <?php echo $this->Form->input('item_id', array('label' => 'Items')); ?>
    <?php echo $this->Form->input('location_id', array('label' => 'Departamentos')); ?>
    <?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $options)); ?>
    <?php echo $this->Form->input('quantity', array('label' => 'Quantidade')); ?>
    <?php echo $this->Form->input('notes',array('label' => 'Anotações')); ?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>