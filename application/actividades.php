<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Actividades extends CI_Controller {
 
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
redirect('actividades');

}

public function actividades()
{
	
		$data['cambia_idioma'] = $this->cambia_idioma('actividades');

/*si la categrioa es actividades*/
	$this->db->where('id_categoria =', 3);
	
/* Si la fecha de creacion de la activiad es menor o igual a la fecha actual */
$this->db->where('fecha_creacion <=', $this->now);
 
/* Y la fecha de vencimiento es mayor a la fecha actual */
$this->db->where('fecha_vencimiento >=', $this->now);
 
 
$this->db->group_by('id_subcategoria','titulo_es', 'link_es','periodo','prioridad');
$this->db->order_by('periodo', 'desc');
 
/* Traemos todas las actividades de nuestra base de datos */
$data['actividades'] = $this->db->get('cnf_subcategoria')->result();
//print_r($data['actividades']);

/*--------------periodos-------------*/

/*si la categoria es actividades*/
$this->db->select('periodo');

	$this->db->where('id_categoria =', 3);
	
/* Si la fecha de creacion de la actividad es menor o igual a la fecha actual */
$this->db->where('fecha_creacion <=', $this->now);
 
/* Y la fecha de vencimiento es mayor a la fecha actual */
$this->db->where('fecha_vencimiento >=', $this->now);
 
 
$this->db->order_by('periodo', 'desc');
$this->db->distinct('periodo');

    
/* Traemos todas las periodo de nuestra base de datos */
$data1['periodos'] = $this->db->get('cnf_subcategoria')->result();
//print_r($data1['periodos']);

//$output = $this->grocery_crud->render1($data);


 
/* Mandamos las variables a la vista */
//$this->load->view('categoria/actividades',$data);
$this->load->view('actividades',$data);

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
 