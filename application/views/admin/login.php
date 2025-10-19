<!DOCTYPE html>
<html>
<head>
   <title>Admin -Iniciar Sesion</title>
      <link href="<?=base_url()?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     </style>
</head>
<body>
   
<div class="container">
     <div class="row"> <div class="col-lg-6 col-sm-6"> <h1>Admin - Fundaci&oacute;n Compartir</h1> </div> </div>
</div>
<hr/>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>

<div class="container">
     <div class="row">
          <div class="col-lg-4 col-sm-4 well">
          <?php 
         // $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");?>
          <fieldset>
               <legend>Iniciar Sesi&oacute;n</legend>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                    <label for="username" class="control-label">Usuario</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="username" name="username" placeholder="Usuario" type="text" value="<?php echo set_value('username'); ?>" />
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
               <label for="txt_password" class="control-label">Password</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="password" name="password" placeholder="Contraseña" type="password" value="<?php echo set_value('password'); ?>" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
               </div>
               </div>
               </div>
                              
               <div class="form-group">
               <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
               </div>
               </div>
          </fieldset>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
     
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>