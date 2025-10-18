<?php include 'header.php';?>
<?php 
if($servicios): ?>

<?php foreach($servicios as $serv):  	?>

<?php   if( $serv->posicion == 1)  {  	?>
<div class="box960info">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr valign="top">
      <td rowspan="2"><h1><?php echo  $serv->titulo; ?> </h1>
        <h2><?php echo  $serv->subtitulo; ?></h2>
        <p><?php echo  $serv->contenido; ?></p></td>
      <td><img src="<?php echo base_url().'assets/uploads/files/'.$serv->foto; ?>" width="100" height="125" alt="Mgr. Elke" />
    </td>
    </tr>
    <tr valign="top">
      <td><p><strong>Mgr. Elke Berodt</strong></p></td>
    </tr>
  </table>
</div>
<?php } ?>
<?php if( $serv->posicion == 2 ){ ?>

<div class="box960">
	<div class="box640">
        <div class="box640head"><img src="<?php echo base_url().lang('idioma.grafico_serviciosAtenciones'); ?>" width="620" height="48"  /></div>
			  <div class="box640body">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr valign="top">
            	<td height="385"><h2><img src="<?php  echo base_url().'assets/uploads/files/'.$serv->foto; ?>" alt="" width="240" height="180" /></h2>
                <h2><?php echo  $serv->subtitulo; ?> </h2>
										<p><?php echo  $serv->contenido; ?></p>
                <ul><li><a href="vermas<?php echo '/'.$serv->id_subcategoria; ?>"><?php echo  $serv->link; ?></a></li><ul>

              </td>
              <?php } ?>
<?php if( $serv->posicion == 3 ){ ?>
              <td height="385"><h2><img src="<?php echo base_url().'assets/uploads/files/'.$serv->foto; ?>" alt="" width="240" height="180" /></h2>
                <h2><?php echo  $serv->subtitulo; ?> </h2>
                <p><?php echo  $serv->contenido; ?></p>
                <ul>
                  <li><a href="vermas<?php echo '/'.$serv->id_subcategoria; ?>"><?php echo  $serv->link; ?></a></li>
<?php } ?>   
<?php if( $serv->posicion == 4 ){ ?>

                  <li><a href="vermas<?php echo '/'.$serv->id_subcategoria; ?>"><?php echo  $serv->link; ?></a></li>
                  
                  
            
              </ul></td>
            </tr>
          </table>
</div> 
        <div class="box640foot"> </div>    
  </div>
<?php } ?>   

     <?php if( $serv->posicion == 5 ){ ?>
    <div class="box320">
    	
        <div class="box320head"><img src="<?php echo base_url().lang('idioma.grafico_serviciosFamiliar'); ?>" width="300" height="48" /></div>
        <div class="box320body">
                  <h2><img src="<?php echo base_url().'assets/uploads/files/'.$serv->foto; ?>" width="240" height="180" /></h2>
                  <h2><?php echo  $serv->subtitulo; ?></h2>
									<p><?php echo  $serv->contenido; ?></p>
          <ul>
            <li><a href="vermas<?php echo '/'.$serv->id_subcategoria; ?>"><?php echo  $serv->link; ?></a></li>
          </ul>
        </div>    
        <div class="box320foot"></div>    
    </div>
     <?php } ?>
     <?php if( $serv->posicion == 6 ){ ?>
</div>
    <div class="box960info"> 
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="<?php echo base_url().'assets/uploads/files/'.$serv->foto; ?>" width="300" height="202" /></td>
        <td><h2><strong><?php echo  $serv->subtitulo; ?></strong></h2>
          <ul><?php echo  $serv->contenido; ?>         
        </ul></td>
      </tr>
    </table>
    </div>
</div>
<?php } ?>

<?php endforeach; ?>
<?php endif; ?>
<?php include 'footer.php';?>
    
</body>
</html>