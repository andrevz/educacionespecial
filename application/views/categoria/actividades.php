
<?php include 'header.php';?>


  <div class="sidebar">
    <div class="box320">
        <div class="box320img"><img src="<?php echo base_url(); ?>/images/1942.jpg" width="300" height="454" alt="Imagen Actividades" /> </div>  

    </div></div>
    

<div id="column">
<div class="box640">


<?php 
$periodo=0;
if($actividades): ?>

<?php foreach($actividades as $actividad):
 if($periodo <> $actividad->periodo)
 {
 	?>
 		<div class="box640head" style="background-image: url(<?php echo base_url(); ?>images/act.png); height: 48px; width: 620; align:center;" >
			<div class="titleGes" > <?php echo $actividad->periodo; ?> <a class="titleAct">  <?php echo lang('idioma.actividad_subtitulo') ; ?> <?php echo $actividad->periodo; ?></a>  </div> 
		</div>
	<?php 
	$periodo=$actividad->periodo;
 }
 ?>
	
   <div class="box640body2"><p><A href=<?php echo base_url().'assets/uploads/files/'.$actividad->link; ?> target=_blank><?php echo $actividad->titulo; ?></A></p></div>  
   <div class="box640foot"></div>    
<?php endforeach; ?>
<?php else: ?>
<div class="alert alert-danger">
 <?php echo lang('idioma.actividad_mensaje_sinact') ; ?>

</div>
<?php endif; ?>

</p>
         
</div>         
 
</div>
</div>
<?php include 'footer.php';?>

</div>
    
</body>
</html>
