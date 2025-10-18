<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Categoria extends CI_Controller {
 
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
		//Enabling Caching,set time in minutes.
		//$this->output->cache(60);
//$this->output->enable_profiler(true);
		 
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
	  $this->load->view('categorias/inicio');
  
}

public function inicio()
{
	if($this->uri->segment(1) == "en"){
		$this->db->select('id_subcategoria,titulo_en as titulo,subtitulo_en as subtitulo,foto, contenido_en as contenido');
	}
	else{
  	$this->db->select('id_subcategoria,titulo_es as titulo,subtitulo_es as subtitulo,foto, contenido_es as contenido');
	}
	
	
$this->db->from('cnf_subcategoria');
$this->db->where('id_categoria =', 1);
$this->db->where('estado =', "ACTIVO");
$this->db->order_by('posicion', 'asc');

$data['inicio'] = $this->db->get()->result();

	/*********************avisos importantes*******************/
	if($this->uri->segment(1) == "en"){
		$this->db->select('id_subcategoria,titulo_en as titulo');
	}
	else{
	$this->db->select('id_subcategoria,titulo_es as titulo');
	}
$this->db->from('cnf_subcategoria');
$this->db->where('id_categoria =', 9);
$this->db->where('estado =', "ACTIVO");
$this->db->order_by('id_categoria', 'asc');
$this->db->order_by('prioridad', 'asc');

$data['avisos_importantes'] = $this->db->get()->result();

	/****************************header*****************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/inicio" ,'idioma_en' =>base_url()."en/categoria/inicio");


	$this->load->view('categoria/inicio',$data );

		

	
}


public function servicios()
{
		if($this->uri->segment(1) == "es"){
		$this->db->select('id_subcategoria,titulo_es as titulo,subtitulo_es as subtitulo,foto, link_es as link,contenido_es as contenido, posicion');
	}
	else{
	$this->db->select('id_subcategoria,titulo_en as titulo,subtitulo_en as subtitulo,foto,link_en as link, contenido_en as contenido, posicion');
	}
	
$this->db->from('cnf_subcategoria');
$this->db->where('id_categoria =', 2);
$this->db->where('estado =', "ACTIVO");
$this->db->order_by('posicion', 'asc');

$data['servicios'] = $this->db->get()->result();
/****************************links*********************************/
		if($this->uri->segment(1) == "es"){
		$this->db->select('a.id_subcategoria,a.posicion,b.titulo_es as titulourl, b.url_es as url');
	}
	else{
	  $this->db->select('a.id_subcategoria,a.posicion,b.titulo_en as titulourl, b.url_en as url');
	}
	
$this->db->from('cnf_subcategoria a, cnf_link b');
$this->db->where('a.id_subcategoria =b.id_subcategoria');
$this->db->where('a.id_categoria =', 2);
$this->db->where('a.estado =', "ACTIVO");
$this->db->order_by('a.posicion', 'asc');

$data['links'] = $this->db->get()->result();
/****************************header*****************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/servicios" ,'idioma_en' =>base_url()."en/categoria/servicios");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/servicios',$data);
}

public function actividades()
{
	

	if($this->uri->segment(1) == "es")
	{
		$this->db->select('id_subcategoria,titulo_es as titulo, link_es as link,periodo,prioridad');
	}
	else{
	$this->db->select('id_subcategoria,titulo_en as titulo, link_en as link,periodo,prioridad');
	}
$this->db->from('cnf_subcategoria');

/*si la categrioa es actividades*/
$this->db->where('id_categoria =', 3);
$this->db->where('estado =', "ACTIVO");
 
	if($this->uri->segment(1) == "es")
	{
		$this->db->group_by('id_subcategoria','titulo_es', 'link_es','periodo','prioridad');
		$this->db->order_by('periodo', 'desc');
		$this->db->order_by('id_subcategoria', 'desc');

	}
	else
	{
		$this->db->group_by('id_subcategoria','titulo_en', 'link_en','periodo','prioridad');
		$this->db->order_by('periodo', 'desc');
		$this->db->order_by('id_subcategoria', 'desc');
		
	}
	 

	 
/* Traemos todas las actividades de nuestra base de datos */
$data['actividades'] = $this->db->get()->result();
#print_r($data['actividades']);
	/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/actividades" ,'idioma_en' =>base_url()."en/categoria/actividades");


/* Mandamos las variables a la vista */
	$this->load->view('categoria/actividades',$data);
	
//	$data['cambia_idioma'] = $this->cambia_idioma('actividades');

}

public function cooperacion()
{
		if($this->uri->segment(1) == "es")
	{
		$this->db->select('id_subcategoria,titulo_es as titulo, subtitulo_es as subtitulo, contenido_es as contenido,foto');
	}
	else{
	  $this->db->select('id_subcategoria,titulo_en as titulo, subtitulo_en as subtitulo, contenido_en as contenido,foto');
	}
$this->db->from('cnf_subcategoria');


$this->db->where('id_categoria =', 4);
$this->db->where('estado =', "ACTIVO");
$this->db->order_by('posicion', 'asc');

$data['cooperacion'] = $this->db->get()->result();
		/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/cooperacion" ,'idioma_en' =>base_url()."en/categoria/cooperacion");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/cooperacion',$data);
}

public function convenios()
{
	if($this->uri->segment(1) == "es")
	{
		$this->db->select('id_subcategoria,titulo_es as titulo,subtitulo_es as subtitulo, contenido_es as contenido,foto');
	}
	else{
	  $this->db->select('id_subcategoria,titulo_en as titulo,subtitulo_en as subtitulo, contenido_en as contenido,foto');
	}
$this->db->from('cnf_subcategoria');

/*si la categrioa es actividades*/
$this->db->where('id_categoria =', 5);
$this->db->where('estado =', "ACTIVO");
 
	if($this->uri->segment(1) == "es")
	{
		$this->db->order_by('posicion', 'asc');
	}
	else
	{
		$this->db->order_by('id_subcategoria', 'asc');
	}
	
	/* Traemos todas las actividades de nuestra base de datos */
$data['convenios'] = $this->db->get()->result();
	/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/convenios" ,'idioma_en' =>base_url()."en/categoria/convenios");


 /* Mandamos las variables a la vista */
$this->load->view('categoria/convenios',$data);

}

public function contacto()
{
		if($this->uri->segment(1) == "es"){
		$this->db->select('id_subcategoria,titulo_es as titulo,foto, contenido_es as contenido, posicion');
	}
	else{
	$this->db->select('id_subcategoria,titulo_en as titulo, foto, contenido_en as contenido, posicion');
	}
	
$this->db->from('cnf_subcategoria');
$this->db->where('id_categoria =', 6);
$this->db->where('estado =', "ACTIVO");
$this->db->order_by('posicion', 'asc');

$data['contacto'] = $this->db->get()->result();
/****************************header*****************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/contacto" ,'idioma_en' =>base_url()."en/categoria/contacto");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/contacto',$data);
}


public function articulos()
{
 
 if($this->uri->segment(1) == "es")
	{
		$this->db->select('id_subcategoria,titulo_es as titulo, link_es as link');
	}
	else{
	$this->db->select('id_subcategoria,titulo_en as titulo, link_en as link');
	}
$this->db->from('cnf_subcategoria');


$this->db->where('id_categoria =', 7);
$this->db->where('estado =', "ACTIVO");
 
	if($this->uri->segment(1) == "es")
	{
		$this->db->group_by('id_subcategoria','titulo_es', 'link_es');
		$this->db->order_by('id_subcategoria', 'asc');

	}
	else
	{
		$this->db->group_by('id_subcategoria','titulo_en', 'link_en');
		$this->db->order_by('id_subcategoria', 'asc');
		
	}
	 

	 
/* Traemos todas las actividades de nuestra base de datos */
$data['articulos'] = $this->db->get()->result();
 /* Mandamos las variables a la vista */
 	/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/articulos" ,'idioma_en' =>base_url()."en/categoria/articulos");

 
$this->load->view('categoria/articulos',$data);
//print_r($data['articulos']);


}

public function info()
{
		/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/info" ,'idioma_en' =>base_url()."en/categoria/info");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/info',$data);
}

public function sendemail()
{
		/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/info" ,'idioma_en' =>base_url()."en/categoria/info");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/sendemail',$data);
}

public function formulario()
{
	/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/formulario" ,'idioma_en' =>base_url()."en/categoria/formulario");

 /* Mandamos las variables a la vista */
$this->load->view('categoria/formulario',$data);
}



//cambiamos el valor del select dependiendo del primer segmento de la url



public function vermas($subcategoria)
//public function vermas()
{
	
	if($this->uri->segment(1) == "es")
	{
		$this->db->select('s.vermas_titulo_es as titulo, s.vermas_subtitulo_es as subtitulo,s.vermas_contenido_es as contenido,s.vermas_foto, l.titulo_es as titulo_link, l.url_es as url_link');
	}
	else{
	  $this->db->select('s.vermas_titulo_en as titulo, s.vermas_subtitulo_en as subtitulo,s.vermas_contenido_en as contenido,s.vermas_foto, l.titulo_en as titulo_link, l.url_en as url_link');
	}
$this->db->from('cnf_subcategoria s left join cnf_link l on s.id_subcategoria = l.id_subcategoria' );
//$this->db->where('s.id_subcategoria = l.id_subcategoria');
$this->db->where('s.id_subcategoria =', $subcategoria);
$this->db->where('s.estado =', "ACTIVO");
$this->db->order_by('l.id_link', 'asc');
	
$data['vermas'] = $this->db->get()->result();
	/*********************************************************/
$data['header'] = array('idioma_es' => base_url()."es/categoria/vermas" ,'idioma_en' =>base_url()."en/categoria/vermas");


 /* Mandamos las variables a la vista */
$this->load->view('categoria/vermas',$data);

}

}
 