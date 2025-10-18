<?php 
if($avisos_importantes): ?>

<?php foreach($avisos_importantes as $avisos):
 	?>
	<li><h1 align="center"><?php echo $avisos->titulo; ?></h1></li>
 
 <?php endforeach; ?>
<?php endif; ?>


