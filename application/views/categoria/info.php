<?php include 'header.php';?>    
  <div class="box320">
        <div class="box320head"><img src="images/h_request.png" width="300" height="48" alt="Avisos Importantes" />
      </div>    
        <div class="box320body">
          <ul>
            <li>Llenar el formulario de  inscripción </li>
            <li>2 fotos tamaño carnet </li>
            <li>Fotocopia certificado de  nacimiento </li>
            <li>Fotocopia certificado de  vacunación </li>
            <li>Informe neurológico o  médico actualizado</li>
            <li> Entrevista con los progenitores o apoderados y  el niño(a) </li>
            <li> Cancelación mensual de:<br />
              <p><strong>Bs.800</strong></p>
(Incluye seguro contra accidentes, material y  refrigerio)</li>
          </ul>
</div>
        <div class="box320foot">
        </div>    
  </div>

<div class="box320">
      <div class="box320head"><img src="images/h_sendemail.png" width="300" height="48" alt="Avisos Importantes" />
    </div>    
        <div class="box320body">
                  <h1>Si desea, puede enviarnos un mensaje. Gracias.</h1>
<form method="post" action="sendeail.php">

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
            <p>Tu Nombre:<br />
              <input type="text" name="visitor" size="35" />
            </p>
            <p> 
              Email:<br />
              <input type="text" name="visitormail" size="35" />
              <br /><br /> 
              Mensaje
              <br />
              <textarea name="notes" rows="4" cols="30"></textarea>
            </p>
            <p>
              <input type="submit" value="Enviar" />
              <br />
            </p>
</form>
</div>    
        <div class="box320foot">
        </div>    
  </div>
    <div class="box320">
        <div class="box320head"><img src="images/h_contacto.png" width="300" height="48" alt="Avisos Importantes" />
      </div>    
        <div class="box320body">
          <h1><img src="images/croquis.gif" width="253" height="214" /></h1>
          <h1><strong>Horario</strong></h1>
          <ul>
            <li>Horario  Jardín  Infantil<br />
            (turno mañana)      08:00 – 12:30            </li>
          </ul>
          <p><strong>Dirección:</strong><br />
          Calle Ismael Vasquez Nº 822 / Av. Papa Paulo</p>
          <p><strong>Teléfono:</strong><br />
            4530644  </p>
           <p><b>educacionespecial@fundacioncompartir.net</b></p>
           <p><b>compartir@supernet.com.bo</b></p>
      </div>    
        <div class="box320foot">
        </div>    
    </div>
    

</div>

<?php include 'footer.php';?>
    
</body>
</html>