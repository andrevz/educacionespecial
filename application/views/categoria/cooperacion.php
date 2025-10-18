<?php include 'header.php';?>    
  <div id="columncenter">
      <div class="box640">
        <div class="box640head"><img src="<?php echo base_url(); ?>images/<?php echo lang('idioma.grafico_cooperacion'); ?>" width="620" height="48"  /></div>    
        <div class="box640body">
      
<?php 
if($cooperacion): ?>

<?php foreach($cooperacion as $coop):
 	?>
		       <h1><?php echo $coop->titulo; ?></h1>
		       <h3><?php echo $coop->subtitulo; ?></h3>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%"  align="center"  ><p><img src="<?php echo base_url().'assets/uploads/files/'.$coop->foto; ?>" height="150"  width="150"  align="center" class="img1" /></p></td>
            <td width="60%" align="left" valign="top">
            <table width="100%" height="100%"  ><tr ><td align="left" valign="bottom"><p><?php echo $coop->contenido; ?></p></td></tr>
            <tr width="10%"><td align="right" valign="bottom"><p> <a href="vermas<?php echo '/'.$coop->id_subcategoria; ?>"><?php echo lang('idioma.grafico_vermas'); ?></a></p></td></tr></table>
            </td>
          
         
          </tr>
        </table>

<?php endforeach; ?>
<?php endif; ?>
                 
        </div>    
        <div class="box640foot"> </div>    
       </div>
   </div>
</div>

<?php include 'footer.php';?>

</body>
</html>