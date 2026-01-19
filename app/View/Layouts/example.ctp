<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->Flash->render('auth'); ?>
	<div id="container">
		<div id="header">
            <h2>Header</h2>
        </div>
		<div id="content">
            <h2>Layout de exemplo</h2>
			<?php echo $this->Flash->render(); ?>
            <?php echo $this->element('sidebar'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<h2>Footer</h2>
		</div>
	</div>
</body>
</html>
