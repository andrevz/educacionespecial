<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
 
protected $now;
 
public function __construct()
{
parent::__construct();
/* Cargamos el helper url y date */
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('language');
		$this->lang->load('idioma'); 
/* Inicializamos la base de datos */
$this->load->database();
/* Cargamos la libreria groceru_crud */
$this->load->library('grocery_crud');
/* Obtenemos la fecha actual */
$timestamp = now();
$timezone = 'UM8';
$daylight_saving = FALSE;
 
$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
$datestring = "%Y-%m-%d %h:%i:%s";
 
$this->now = mdate($datestring, $now);
}

function Admin() {
    parent::Controller();
    $this->load->helper('url');

    // ensure user is signed in
    if ( $this->session->userdata('login_state') == FALSE ) {
      redirect( "admin/login" );    // no session established, kick back to login page
    }
}

public function login()
{
   $this->load->helper(array('form'));
   $this->load->view('admin/login');
}
 
public function index()
{
	 $this->load->helper(array('form'));
   $this->load->view('admin/login');
}

public function inicio()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','1');
 
/* Nombre de referencia a la tabla */
//$crud->set_subject('Inicio');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 
/* Ocultar campos*/

$crud->field_type('posicion', 'hidden');
$crud->field_type('prioridad', 'hidden',0);
$crud->field_type('id_categoria','hidden',1);
$crud->field_type('fecha_creacion','hidden',date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('estado','hidden','ACTIVO');
$crud->field_type('link_es','hidden');
$crud->field_type('link_en','hidden');
$crud->field_type('periodo','hidden');
$crud->field_type('tiene_links','hidden',0);

$crud->field_type('vermas_titulo_es','hidden');
$crud->field_type('vermas_titulo_en','hidden');
$crud->field_type('vermas_subtitulo_es','hidden');
$crud->field_type('vermas_subtitulo_en','hidden');
$crud->field_type('vermas_contenido_es','hidden');
$crud->field_type('vermas_contenido_en','hidden');
$crud->field_type('vermas_foto','hidden');

 $crud->callback_column('seccion',array($this,'_GC_Seccion'));

/*setear valors constantes a un campo invisible*/
$crud->callback_before_insert(array($this,'set_categoryinicio'));

function set_categoryinicio($post_array){
    $post_array['id_categoria'] = 1;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    $post_array['estado'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'contenido_es',
'contenido_en'
);
 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'seccion'
);



   
/* declarar a un campo campo de upload*/
$crud->set_field_upload('foto','assets/uploads/files');
//$crud->callback_before_insert(array($this,'_append_uploaded_file'));
//$crud->callback_before_update(array($this,'_append_uploaded_file'));

//Remove the delete operation from the CRUD 
  $crud->unset_delete();
  $crud->unset_add();
  
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/inicio', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function servicios()
{
	try{
	$crud = new grocery_CRUD();
	$crud->set_theme('flexigrid');
	$crud->set_table('cnf_subcategoria');
	//$crud->set_relation('bbbb','cnf_subcategoria','ccccc');
	//$crud->set_table('cnf_link');
	//$crud->set_relation('id_subcategoria','cnf_subcategoria','id_subcategoria');
	
	$crud->where('id_categoria','2');
	$crud->set_subject('Servicios');
	$crud->set_language('spanish');
	 
	/* Ocultar campos*/
	$crud->field_type('prioridad', 'hidden');
	$crud->field_type('periodo', 'hidden');
	$crud->field_type('fecha_vencimiento', 'hidden');
	$crud->field_type('posicion', 'hidden');
	$crud->field_type('id_categoria','hidden',2);
	$crud->field_type('fecha_creacion','hidden', date('Y-m-d H:i:s'));
	/*
	$crud->field_type('link_es','hidden');
	$crud->field_type('link_en','hidden');
	*/
	$crud->field_type('estado','hidden','ACTIVO');
	$crud->field_type('tiene_links','hidden','ACTIVO');	
	
$crud->field_type('vermas_subtitulo_es','hidden');
$crud->field_type('vermas_subtitulo_en','hidden');
/*
$crud->field_type('vermas_titulo_es','hidden');
$crud->field_type('vermas_titulo_en','hidden');
$crud->field_type('vermas_contenido_es','hidden');
$crud->field_type('vermas_contenido_en','hidden');
$crud->field_type('vermas_foto','hidden');
	*/
	$crud->callback_column('seccion',array($this,'_GC_Seccion'));
/*	 $crud->field_type('tiene_links','dropdown',
            array('0'  => 'NO','1' => 'SI'));
 */
	/* Estos campos seran obligatorios */
	$crud->required_fields(
	'titulo_es',
	'titulo_en',
	'subtitulo_es',
	'subtitulo_en',
	'contenido_es',
	'contenido_en'
	);
	 
	/* Establecemos las columnas que mostraran */
	$crud->columns(
	'titulo_es',
	'subtitulo_es',
	'seccion'
	);
	/* declarar a un campo campo de upload*/
	$crud->set_field_upload('foto','assets/uploads/files');
  $crud->set_field_upload('vermas_foto','assets/uploads/files');
//$crud->callback_before_insert(array($this,'_append_uploaded_file'));
//$crud->callback_before_update(array($this,'_append_uploaded_file'));

	
	
	//Remove the delete operation from the CRUD 
  $crud->unset_delete();
  $crud->unset_add();
  
	/* Obtenemos la tabla dinamica */
	$output = $crud->render();
	$this->load->view('admin/servicios', $output);
	}catch(Exception $e){
	show_error($e->getMessage().' --- '.$e->getTraceAsString());
	}

}
 
public function actividades()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','3');
 
/* Nombre de referencia a la tabla */
$crud->set_subject('Actividades');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 
/* Ocultar campos*/
$crud->field_type('contenido_es', 'hidden');
$crud->field_type('contenido_en', 'hidden');
$crud->field_type('subtitulo_es', 'hidden');
$crud->field_type('subtitulo_en', 'hidden');
$crud->field_type('foto', 'hidden');
$crud->field_type('posicion', 'hidden');
$crud->field_type('prioridad', 'hidden');
$crud->field_type('id_categoria','hidden',3);
$crud->field_type('fecha_creacion','hidden', date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('tiene_links','hidden',0);


$crud->field_type('vermas_titulo_es','hidden');
$crud->field_type('vermas_titulo_en','hidden');
$crud->field_type('vermas_subtitulo_es','hidden');
$crud->field_type('vermas_subtitulo_en','hidden');
$crud->field_type('vermas_contenido_es','hidden');
$crud->field_type('vermas_contenido_en','hidden');
$crud->field_type('vermas_foto','hidden');

/* Estos campos seran obligatorios */
$crud->required_fields(
'periodo',
'titulo_es',
'titulo_en',
'link_es',
'link_en',
'estado'
);

 $crud->field_type('periodo','dropdown',
            array('2017' => '2017','2016'  => '2016','2015'  => '2015','2014'  => '2014','2013'  => '2013','2012'  => '2012','2011'  => '2011','2010'  => '2010','2009'  => '2009','2008'  => '2008'));
 
/* Establecemos las columnas que mostraran */
$crud->columns(
'periodo',
'titulo_es',
'titulo_en',
'link_es',
'link_en',
'estado'
);

// Display field as
   $crud->display_as('periodo','Periodo');
   $crud->display_as('link_es','PDF es ');
   $crud->display_as('link_en','PDF en');
   $crud->display_as('estado','Estado');
/* declarar a un campo campo de upload*/
$crud->set_field_upload('link_es','assets/uploads/files');
$crud->set_field_upload('link_en','assets/uploads/files');
//$crud->callback_before_insert(array($this,'_append_uploaded_file'));
//$crud->callback_before_update(array($this,'_append_uploaded_file'));

 
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/actividades', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function cooperacion()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','4');
 
/* Nombre de referencia a la tabla */
$crud->set_subject('Cooperacion');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 
/* Ocultar campos*/
$crud->field_type('prioridad', 'hidden');
$crud->field_type('id_categoria','hidden',4);
$crud->field_type('fecha_creacion','hidden',date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('periodo', 'hidden');
$crud->field_type('link_es','hidden');
$crud->field_type('link_en', 'hidden');
$crud->field_type('tiene_links', 'hidden');

$crud->set_rules('posicion','Posicion','integer');

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'contenido_es',
'contenido_en',
'foto',
'estado',
'vermas_titulo_es',
'vermas_titulo_en',
'vermas_contenido_es',
'vermas_contenido_en',
'vermas_foto',
'posicion'
);

 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'estado',
'posicion'
);

// Display field as
   $crud->display_as('titulo_es','Titulo es');
   $crud->display_as('titulo_en','Titulo en');
   $crud->display_as('contenido_es','Contenido es ');
   $crud->display_as('contenido_en','Contenido en');
   $crud->display_as('estado','Estado');


/* declarar a un campo campo de upload*/
$crud->set_field_upload('foto','assets/uploads/files');
$crud->set_field_upload('vermas_foto','assets/uploads/files');
$crud->callback_before_insert(array($this,'_append_uploaded_file'));
$crud->callback_before_update(array($this,'_append_uploaded_file'));

$crud->add_action('Links', base_url().'/images/add_links.png', 'admin/links_cooperacion');

/* Obtenemos la tabla dinamica */ 
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/cooperacion', $output);
 
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function convenios()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','5');
 
/* Nombre de referencia a la tabla */
$crud->set_subject('Convenios');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');

 $crud->set_rules('posicion','Posicion','integer');

 
/* Ocultar campos*/
$crud->field_type('prioridad', 'hidden');
$crud->field_type('id_categoria','hidden',5);
$crud->field_type('fecha_creacion','hidden',date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('periodo', 'hidden');
$crud->field_type('link_es','hidden');
$crud->field_type('link_en', 'hidden');
$crud->field_type('tiene_links', 'hidden');



/*setear valors constantes a un campo invisible*/
$crud->callback_before_insert(array($this,'set_category'));

function set_category($post_array){
    $post_array['id_categoria'] = 5;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'contenido_es',
'contenido_en',
'foto',
'estado',
'vermas_titulo_es',
'vermas_titulo_en',
'vermas_contenido_es',
'vermas_contenido_en',
'vermas_foto',
'posicion'
);

 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'estado',
'posicion'
);

// Display field as
   $crud->display_as('titulo_es','Titulo es');
   $crud->display_as('titulo_en','Titulo en');
   $crud->display_as('contenido_es','Contenido es ');
   $crud->display_as('contenido_en','Contenido en');
   $crud->display_as('estado','Estado');


/* declarar a un campo campo de upload*/
$crud->set_field_upload('foto','assets/uploads/files');
$crud->set_field_upload('vermas_foto','assets/uploads/files');
//$crud->set_field_upload('link_es','assets/uploads/files');
//$crud->set_field_upload('link_en','assets/uploads/files');
$crud->callback_before_insert(array($this,'_append_uploaded_file'));
$crud->callback_before_update(array($this,'_append_uploaded_file'));

$crud->add_action('Links', base_url().'/images/add_links.png', 'admin/links_convenios');
 
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/convenios', $output);
 
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function contacto()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','6');
 
/* Nombre de referencia a la tabla */
//$crud->set_subject('Contactos');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 
/* Ocultar campos*/
$crud->field_type('subtitulo_es', 'hidden');
$crud->field_type('subtitulo_en', 'hidden');
$crud->field_type('posicion', 'hidden');
$crud->field_type('prioridad', 'hidden',0);
$crud->field_type('id_categoria','hidden',6);
$crud->field_type('fecha_creacion','hidden',date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('estado','hidden','ACTIVO');
$crud->field_type('link_es','hidden');
$crud->field_type('link_en','hidden');
$crud->field_type('periodo','hidden');
$crud->field_type('tiene_links','hidden',0);

$crud->field_type('vermas_titulo_es','hidden');
$crud->field_type('vermas_titulo_en','hidden');
$crud->field_type('vermas_subtitulo_es','hidden');
$crud->field_type('vermas_subtitulo_en','hidden');
$crud->field_type('vermas_contenido_es','hidden');
$crud->field_type('vermas_contenido_en','hidden');
$crud->field_type('vermas_foto','hidden');

 $crud->callback_column('seccion',array($this,'_GC_Seccion'));

/*setear valors constantes a un campo invisible*/
$crud->callback_before_insert(array($this,'set_categoryinicio'));

function set_categoryinicio($post_array){
    $post_array['id_categoria'] = 1;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    $post_array['estado'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'contenido_es',
'contenido_en'
);
 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'seccion'
);



   
/* declarar a un campo campo de upload*/
$crud->set_field_upload('foto','assets/uploads/files');
//$crud->callback_before_insert(array($this,'_append_uploaded_file'));
//$crud->callback_before_update(array($this,'_append_uploaded_file'));

//Remove the delete operation from the CRUD 
//  $crud->unset_delete();
//  $crud->unset_add();
  
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/contacto', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function articulos()
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_subcategoria');

/* colocar un filtro en where*/
  $crud->where('id_categoria','7');
 
/* Nombre de referencia a la tabla */
$crud->set_subject('Articulos');
 
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 
/* Ocultar campos*/
$crud->field_type('contenido_es', 'hidden');
$crud->field_type('contenido_en', 'hidden');
$crud->field_type('subtitulo_es', 'hidden');
$crud->field_type('subtitulo_en', 'hidden');
$crud->field_type('foto', 'hidden');
$crud->field_type('posicion', 'hidden');
$crud->field_type('prioridad', 'hidden');
$crud->field_type('periodo', 'hidden');
$crud->field_type('id_categoria','hidden',7);
$crud->field_type('fecha_creacion','hidden', date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
$crud->field_type('tiene_links','hidden',0);


/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'link_es',
'link_en',
'estado'
);

 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'link_es',
'link_en',
'estado'
);

// Display field as
  /* $crud->display_as('titulo_es','Titulo');
   $crud->display_as('titulo_en','Title');
   $crud->display_as('link_es','PDF Espanol ');
   $crud->display_as('link_en','PDF English');
   $crud->display_as('estado','Estado');
*/

/* declarar a un campo campo de upload*/
$crud->set_field_upload('link_es','assets/uploads/files');
$crud->set_field_upload('link_en','assets/uploads/files');
 
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/articulos', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}

public function usuarios()
{
try{
$crud = new grocery_CRUD();
$crud->set_theme('flexigrid');
$crud->set_table('users');
$crud->where('estado','ACTIVO');
$crud->set_language('spanish');
 
/* Ocultar campos*/

$crud->field_type('id', 'hidden');
$crud->change_field_type('password','password');


/*setear valors constantes a un campo invisible*/
/*
 $crud->callback_column('seccion',array($this,'_GC_Seccion'));

$crud->callback_before_insert(array($this,'set_categoryinicio'));

function set_categoryinicio($post_array){
    $post_array['id_categoria'] = 1;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    $post_array['estado'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }
*/
/* Estos campos seran obligatorios */
$crud->required_fields(
'username',
'password',
'estado'
);
 
/* Establecemos las columnas que mostraran */
$crud->columns(
'username',
'estado'
);



   
/* declarar a un campo campo de upload*/
//$crud->set_field_upload('foto','assets/uploads/files');
//$crud->callback_before_insert(array($this,'_append_uploaded_file'));
//$crud->callback_before_update(array($this,'_append_uploaded_file'));

//Remove the delete operation from the CRUD 
  //$crud->unset_delete();
  //$crud->unset_add();
$crud->callback_before_insert(array($this,'encrypt_password_callback'));
$crud->callback_before_update(array($this,'encrypt_password_callback'));

 $crud->callback_edit_field('password',array($this,'decrypt_password_callback'));

  
/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/usuarios', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}


public function avisos_importantes()
{
try{
$crud = new grocery_CRUD();
$crud->set_theme('flexigrid');
$crud->set_table('cnf_subcategoria');
$crud->where('id_categoria','9');
$crud->set_language('spanish');
 
/* Ocultar campos*/
$crud->field_type('posicion', 'hidden');
//$crud->field_type('prioridad', 'hidden');
$crud->field_type('id_categoria','hidden',9);
$crud->field_type('fecha_creacion','hidden',date('Y-m-d H:i:s'));
$crud->field_type('fecha_vencimiento','hidden');
//$crud->field_type('estado','hidden','ACTIVO');
$crud->field_type('link_es','hidden');
$crud->field_type('link_en','hidden');
$crud->field_type('periodo','hidden');
$crud->field_type('periodo','hidden');
$crud->field_type('subtitulo_es','hidden');
$crud->field_type('subtitulo_en','hidden');
$crud->field_type('contenido_es','hidden');
$crud->field_type('contenido_en','hidden');
$crud->field_type('foto','hidden');
$crud->field_type('tiene_links','hidden',0);

$crud->field_type('vermas_titulo_es','hidden');
$crud->field_type('vermas_titulo_en','hidden');
$crud->field_type('vermas_subtitulo_es','hidden');
$crud->field_type('vermas_subtitulo_en','hidden');
$crud->field_type('vermas_contenido_es','hidden');
$crud->field_type('vermas_contenido_en','hidden');
$crud->field_type('vermas_foto','hidden');


/*setear valors constantes a un campo invisible*/
//$crud->callback_before_insert(array($this,'set_categoryAviso'));

//function set_categoryAviso($post_array){
  //  $post_array['id_categoria'] = 9;
   // $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
   // return $post_array;
 //}

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en',
'prioridad',
'estado'
);
 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'prioridad',
'estado'
);
$crud->field_type('prioridad','dropdown',
            array('1' => 'alta','2'  => 'media','3'  => 'baja'));
 

/* Obtenemos la tabla dinamica */
$output = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/avisos_importantes', $output);
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}
public function _GC_Seccion($value, $row) {
return "Seccion ".$row->posicion;
}

function encrypt_password_callback($post_array, $primary_key = null)
{
$this->load->library('encrypt');

$key = 'super-secret-key';
$post_array['password_field'] = $this->encrypt->encode($post_array['password_field'], $key);
return $post_array;
}

function decrypt_password_callback($value)
{
$this->load->library('encrypt');
$key = 'super-secret-key';
$decrypted_password = $this->encrypt->decode($value, $key);
return "<input type='password' name='password_field' value='$decrypted_password' />";
}

public function links_convenios($id_subcategoria)
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_link');

/* colocar un filtro en where*/
  $crud->where('id_subcategoria',$id_subcategoria);
// $crud->where('id_categoria',5);
/* Nombre de referencia a la tabla */
$crud->set_subject('Links_convenios');
 $crud->field_type('id_subcategoria', 'hidden', $id_subcategoria);
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 

/*setear valors constantes a un campo invisible*/
$crud->callback_before_insert(array($this,'set_category'));

function set_category($post_array){
    $post_array['id_categoria'] = 5;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en'
);

 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'url_es',
'url_en'
);


 //  $crud->display_as('url_es','Link PDF es ');
   //$crud->display_as('url_en','Link PDF en');
/* declarar a un campo campo de upload*/
$crud->set_field_upload('url_es','assets/uploads/files');
$crud->set_field_upload('url_en','assets/uploads/files');



/* Obtenemos la tabla dinamica */
$output2 = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/convenios', $output2);
 
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}
public function links_cooperacion($id_subcategoria)
{
try{
/* Instanciamos la clase grocery CRUD */
$crud = new grocery_CRUD();
 
/* Establecemos flexigrid como nuestro tema */
$crud->set_theme('flexigrid');

/* Le decimos que la tabla con la que trabajaremos es cnf_actividades */
$crud->set_table('cnf_link');

/* colocar un filtro en where*/
  $crud->where('id_subcategoria',$id_subcategoria);
// $crud->where('id_categoria',4);
/* Nombre de referencia a la tabla */
$crud->set_subject('Links_cooperacion');
 $crud->field_type('id_subcategoria', 'hidden', $id_subcategoria);
/* Establecemos español como el lenguaje predeterminado */
$crud->set_language('spanish');
 

/*setear valors constantes a un campo invisible*/
$crud->callback_before_insert(array($this,'set_category'));

function set_category($post_array){
    $post_array['id_categoria'] = 4;
    $post_array['fechacreacion'] = date('m/d/Y h:i:s a', time());
    return $post_array;
 }

/* Estos campos seran obligatorios */
$crud->required_fields(
'titulo_es',
'titulo_en'
);

 
/* Establecemos las columnas que mostraran */
$crud->columns(
'titulo_es',
'titulo_en',
'url_es',
'url_en'
);

$crud->set_field_upload('url_es','assets/uploads/files');
$crud->set_field_upload('url_en','assets/uploads/files');

/* Obtenemos la tabla dinamica */
$output2 = $crud->render();

/* La mandamos a la vista */
$this->load->view('admin/cooperacion', $output2);
 
 
}catch(Exception $e){
show_error($e->getMessage().' --- '.$e->getTraceAsString());
}
}
}