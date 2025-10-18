<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
function __construct()
{
   parent::__construct();
   $this->load->model('user','',TRUE);
//   $this->load->library('session');
		$this->load->helper('language');
}
 /*
   public function index()
    {
 
        $this->session->set_userdata('nombre','Israel');
        echo $this->session->userdata('nombre');
 
        $this->session->set_flashdata('edad','32 años');
        echo $this->session->flashdata('edad');
 
 
 
    }
 
    public function logout()
    {
 
        $this->session->sess_destroy();
 
    }
 */
function index()
{
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
 
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('admin/login');
   }
   else
   {
     //Go to private area
//$this->session->set_userdata('cinthia', 'some_value');
     redirect('admin/inicio', 'refresh');
   }
 
}
 /*
public function submit() {
  // authenticate
  $uname = $this->input->post('username');
  $pwd = $this->input->post('password');

  // read user's credentials from db, through Login Model
  if ( $uname == "my_username"  && $pwd == "my_password" )  {
    $this->session->set_userdata('login_state', TRUE);
  } else {
    redirect( 'admin/login' );    // redirect back to login page
  }
}
*/
function check_database($password)
{
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->user->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuario o password Invalido!');
     return false;
   }
}
}
?>