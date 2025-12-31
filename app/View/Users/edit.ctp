<div class="users form">
    <h4>Editar Usuário</h4>
    <?php echo $this->Form->create('User');?>


    <?php echo $this->Form->input('username'); ?>
    
    <?php echo $this->Form->input('password'); ?>

    <?php echo $this->Form->input('role'); ?>
    
    <?php echo $this->Form->end(__('Salvar alterações')); ?>
</div>
