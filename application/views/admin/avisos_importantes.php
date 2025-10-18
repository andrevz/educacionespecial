<html>
<head>
	
<meta charset="utf-8" />
<title>Administraci&oacute;n Avisos Importantes</title>

<?php
foreach($css_files as $file): ?>
<link type="text/css" body  rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<link type="text/css" rel="stylesheet" 
href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
<style type='text/css' >
body
{
font-family: Arial; font-size: 16px; 
padding: 11px;
}
</style>
</head>
<body>
<?php include("header.php"); ?>
<!-- End of header-->
<h1>Avisos Importantes</h1>
    <div>
<?php echo $output; ?>
    </div>
    <?php include("footer.php"); ?>
        
</body>
</html>