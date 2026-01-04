<div class="users form">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Add Name'); ?></legend>
        <?php echo $this->Form->input('name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>