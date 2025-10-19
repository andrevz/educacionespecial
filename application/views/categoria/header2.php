<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset.css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<style type="text/css">
		label{
			display: block;
		}
		.escoge_idioma{
			position: absolute;
			margin: 60px 0px 0px 380px;
			z-index: 100000;
		}
		#capa_formulario{
			background: #42343e;
			color: #fefefe;
			border-radius: 7px;
			border: 4px solid #272822;
			margin-top: 50px;
		}
		#formulario{
			padding: 40px;
		}
		#formulario input[type=text],#formulario input[type=password],#formulario input[type=email]{
			width: 250px;
			padding: 5px 3px;
			border-radius: 4px;
		}
		#formulario input[type=submit]{
			padding: 3px 30px;
			text-align: center;
			border-radius: 4px;
			border: 1px solid #fff;
			background: #272822;
			color: #fff;
		}
	</style>
	<script type="text/javascript">
		$('select').change(function(){
		    var url = $(this).val();
		    window.location = url;
		});
	</script>

<title>COMPARTIR - Centro de Educacion Especial</title>
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function abrirPopUp(lista){
      var valor = lista.value;
      //window.open(valor,'nombre_ventana','parametros');
      location.href=valor;
  }

</script>
</head>
<body onload="MM_preloadImages('<?php echo base_url(); ?>images/a2.png','<?php echo base_url(); ?>images/c2.png','<?php echo base_url(); ?>images/d2.png','<?php echo base_url(); ?>images/f2.png','<?php echo base_url(); ?>images/g2.png','<?php echo base_url(); ?>images/h2.png', '<?php echo base_url(); ?>images/i2.png', '<?php echo base_url(); ?>images/j2.png')">


<div id="container"><div id="header">
	<div id="logo" style="background-image: url(<?php echo base_url().lang('idioma.titulo_logo') ; ?>);" ></div>
		 	<div id="about"></div>
<div id="navbar">
       		<a href="javascript:history.back()" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('volver','','<?php echo base_url().lang('idioma.vermas_volver_imgover') ; ?>',1)"><img src="<?php echo base_url().lang('idioma.vermas_volver_img'); ?>" alt="<?php echo lang('idioma.vermas_volver'); ?>"  name="volver" width="107" height="47" border="0" id="volver" /></a>
       		
          
       		
       	</div>
          	
  </div>
</div>
  
  
