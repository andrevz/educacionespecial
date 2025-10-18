
<?php include 'header.php';?>

 
<div id="columncenter">
<div class="box640">

     <div class="box640head"><img src="<?php echo base_url(); ?>/images/h_interes.png" width="620" height="48" alt="Articulos" />
      </div>    
  
<div class="box640body2">
<ul>
<?php 
if($articulos): ?>

<?php foreach($articulos as $articulo): 	?>
 				
   <li><A href=<?php echo base_url().'assets/uploads/files/'.$articulo->link; ?> target=_blank><?php echo $articulo->titulo; ?></A></li> 
      
<?php endforeach; ?>

<?php endif; ?>
</ul></div> 
</p>
         
</div>         
 
</div>
</div>
<?php include 'footer.php';?>

</div>
    
</body>
</html>
