<?php include 'header2.php';?>  
<?php  if($vermas): 
$cont=0;
?>
<div id="columncenter">
      <div class="box640">
         <div><img src="<?php echo base_url(); ?>images/box640head.png" width="620" height="20"  /> </div>    
 
<?php foreach($vermas as $ver): 	?>
        <div class="box640body">
<?php  if($cont == 0) {?>
          <h1><?php echo $ver->titulo; ?></h1>
          <h2 align="center"><strong><img  src="<?php  echo base_url().'/assets/uploads/files/'.$ver->vermas_foto; ?>" alt="" 
          	style="max-width: 500px; width: expression(this.width > 500 ? 500: true);"    
          	 /></strong></h2>
          <h2><strong><?php echo $ver->subtitulo; ?></strong></h2>
          <p> <?php echo $ver->contenido; ?></p>
          <p>&nbsp;</p>
          <?php if($ver->titulo_link != null){ ?>     
          <p>
             <?php if($ver->url_link != null){ ?>     
               	<a href="<?php  echo base_url().'assets/uploads/files/'.$ver->url_link; ?>"><?php echo $ver->titulo_link; ?></a><br /> 
          	<?php }else{ ?>     
             <a href=""><?php echo $ver->titulo_link; ?></a><br /> 
          	<?php } ?>   
          </p>
           <?php } ?>     
<?php } ?>

<?php  if($cont != 0) {?>
          <p><a href="<?php  echo base_url().'assets/uploads/files/'.$ver->url_link; ?>"><?php echo $ver->titulo_link; ?></a><br /> </p>
<?php } ?>
        </div>    
<?php 
$cont=1;
?>
<?php endforeach; ?>
<?php endif; ?>
        <div class="box640foot"> </div>    
  </div>
  </div>
</div>


<?php include 'footer.php';?>
</body>
</html>
