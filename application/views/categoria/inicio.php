<?php include 'header.php';?>
<div id="column"><div class="box640info">
	

<?php 
if($inicio): ?>

<?php foreach($inicio as $seccion):
 	?>
		<h1><?php echo $seccion->titulo; ?></h1>
		    <?php if( $seccion->subtitulo !=""){ ?>
        <h2><?php echo $seccion->subtitulo; ?> </h2>
        <?php }?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          	<?php if( $seccion->foto !=""){ ?>
            <td><img src="<?php echo base_url().'assets/uploads/files/'.$seccion->foto; ?>" alt="" width="312" height="231" /></td>
            <?php }?>
            <td><p><?php echo $seccion->contenido; ?></p></td>
          </tr>
        </table>
<?php endforeach; ?>
<?php endif; ?>
</div></div>
    

<div class="sidebar">
    <div class="box320" color="blue">
       <div class="box320head"><img src="<?php echo base_url().lang('idioma.grafico_avisos'); ?>" width="300" height="48" alt="<?php echo lang('idioma.new_titulo') ; ?>" /></div>    
		   <div class="box320body"><?php		include 'avisos_importantes.php' ;	?> 
        </div>
 		<div class="box320foot"> </div>
 		
 		<br>
        <div class="box200" style="text-align:center;"><p class="credits"><?php echo lang('idioma.new_contador') ; ?></p>
	        <script type="text/javascript" src="http://contadores.miarroba.es/ver.php?id=647756"></script>

            <a title="contador de visitas" ><img src="https://counter6.optistats.ovh/private/contadorvisitasgratis.php?c=qhqsw4bqf1egrk1264zuuncwuh5zdnzg" border="0" title="contador de visitas" alt="contador de visitas"></a>

        </div>
    </div>
    
</div>
	
<?php include 'footer.php';?>
</div>
</body>
</html>