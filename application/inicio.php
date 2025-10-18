<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Inicio extends CI_Controller {
 
protected $now;
 
public function __construct()
{
	
		parent::__construct();
		/* Cargamos el helper url y date */
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('language');
		//-----------------------------------------
		$this->lang->load('idioma'); 
		//-----------------------------------------
		
		 
		/* Inicializamos la base de datos */
		$this->load->database();
		 
		/* Obtenemos la fecha actual */
		$timestamp = now();
		$timezone = 'UM8';
		$daylight_saving = FALSE;
		 
		$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
		$datestring = "%Y-%m-%d %h:%i:%s";
		 
		$this->now = mdate($datestring, $now);

		
}
 
public function index()
{
	
	/* Redirigimos a la funcion promociones() */
redirect('inicio');

}
public function inicio()
{
	
		$data['cambia_idioma'] = $this->cambia_idioma('inicio');

/*si la categrioa es inicio*/
	$this->db->where('id_categoria =', 1);
	

/* Traemos todas las actividades de nuestra base de datos */
$data['inicio'] = $this->db->get('cnf_subcategoria')->result();

 /* Mandamos las variables a la vista */
$this->load->view('inicio',$data);

}

//cambiamos el valor del select dependiendo del primer segmento de la url
	public function cambia_idioma($menu)
	{
	?>
	
	   <div class="div-1a">
		<select >
	 	<?php
	 	if($this->uri->segment(1) == "en")
	 	{
	 	?>
	 		<option value="<?=base_url()?>en/categoria/<?php echo $menu;?>">EN</option> 
	 		<option value="<?=base_url()?>es/categoria/<?php echo $menu;?>">ES</option>

	 	<?php
	 	}else{
	 		?>
	 	<option value="<?=base_url()?>es/categoria/<?php echo $menu;?>">ES</option> 
	 		<option value="<?=base_url()?>en/categoria/<?php echo $menu;?>">EN</option>
	 	<?php
	 	}
	 	?>
	 	</select>
	</div>
	
	<?php
	}




}
 