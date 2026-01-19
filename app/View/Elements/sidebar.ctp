
<h2>Sidebar</h2>
<?php echo $this->Html->link('Usuários', array('controller' => 'users', 'action' => 'tolist')); ?><br>
<?php echo $this->Html->link('Movimentação', array('controller' => 'movements', 'action' => 'tolist')); ?><br>
<?php echo $this->Html->link('Categorias', array('controller' => 'categories', 'action' => 'tolist')); ?><br>
<?php echo $this->Html->link('Departamentos', array('controller' => 'locations', 'action' => 'tolist')); ?><br>
<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?><br>