<div class="users form">
<?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <legend><?php echo __('Add Name'); ?></legend>
        <?php echo $this->Form->input('name', array('label' => 'Nome'));?>
    </fieldset>
    <?php echo $this->Form->input('description', array('type' => 'text', 'label' => 'Descrição'));?>
    <?php echo $this->Form->input('category_id', array('label' => 'Categorias'));?>
    <?php echo $this->Form->input('location_id', array('label' => 'Localização'));?>
    <?php echo $this->Form->input('quantity', array('label' => 'Quantidade'));?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>