<div class="users form">
<?php echo $this->Form->create('Movement'); ?>
<!--O user_id vai vir da session-->
<?php echo $this->Form->input('item_id', array('label' => 'Items')); ?>
<?php echo $this->Form->select('type', $options); ?>
<?php echo $this->Form->input('quantity'); ?>
<?php echo $this->Form->input('notes'); ?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>