<?php include 'header.php';?>    

<?php 
if($contacto): ?>

<?php foreach($contacto as $serv):  	?>

<?php   if( $serv->posicion == 1)  {  	?>
<div class="box320">
        <div class="box320head"><img src="<?php echo base_url().lang('idioma.contacto_seccion1_imag'); ?>" width="300" height="48" alt="<?php echo  $serv->titulo; ?>" /></div>    
        <div class="box320body"><?php echo  $serv->contenido; ?></div>
        <div class="box320foot"></div>    
</div>

<?php } ?>
<?php if( $serv->posicion == 2 ){ ?>
<div class="box320">
      <div class="box320head"><img src="<?php echo base_url().lang('idioma.contacto_seccion2_imag'); ?>" width="300" height="48" alt="<?php echo  $serv->titulo; ?>" /></div>    
      <div class="box320body"> <h1><?php echo  $serv->contenido; ?></h1> 
      	<form method="post" action="sendemail">
        <p>
					<!-- DO NOT change ANY of the php sections -->
					<?php
					$ipi = getenv("REMOTE_ADDR");
					$httprefi = getenv ("HTTP_REFERER");
					$httpagenti = getenv ("HTTP_USER_AGENT");
					?>
				  <input type="hidden" name="ip" value="<?php echo $ipi ?>" />
				  <input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
				  <input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />
        </p>
            <p><?php echo lang('idioma.contacto_form_nombre'); ?><br />
              <input type="text" name="visitor" size="29" />
            </p>
            <p><?php echo lang('idioma.contacto_form_fono'); ?><br />
              <input type="text" name="visitorphone" size="29" />
            </p>
            <p> 
              <?php echo lang('idioma.contacto_form_email'); ?><br />
              <input type="text" name="visitormail" size="29" />
              <br /><br /> 
              <?php echo lang('idioma.contacto_form_mensaje'); ?>
              <br />
              <textarea name="notes" rows="4" cols="30"></textarea>
            </p>
            <p>
              <input type="submit" value="<?php echo lang('idioma.contacto_form_enviar'); ?>" />
              <br />
            </p>
				</form>
				</div>    
        <div class="box320foot"> </div>    
</div>
<?php } ?>
<?php if( $serv->posicion == 3 ){ ?>
<div class="box320">
        <div class="box320head"><img src="<?php echo base_url().lang('idioma.contacto_seccion3_imag'); ?>" width="300" height="48" alt="<?php echo  $serv->titulo; ?>" /></div>    
        <div class="box320body">
          <h1 style="text-align:center"><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3807.6130800297165!2d-66.15291302483516!3d-17.382341583503912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDIyJzU2LjQiUyA2NsKwMDknMDEuMiJX!5e0!3m2!1ses!2sbo!4v1696988433981!5m2!1ses!2sbo" width="258" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></h1>
          <?php echo  $serv->contenido; ?>
        </div>    
        <div class="box320foot"></div>
</div>
<?php } ?>  
</div>
<?php endforeach; ?>
<?php endif; ?>

<?php include 'footer.php';?>
    
</body>
</html>