<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <?php echo __('Área de login'); ?></legend>
    <?php echo $this->Form->input('username');?>
    <?php echo $this->Form->input('password');?>   
<?php echo $this->Form->end(__('entrar')); ?>
</div>