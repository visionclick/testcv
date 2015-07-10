<?
require_once('MY_Controller.php');
class MY_AdminController extends MY_Controller {
 
      function __construct($requiereLogin = false){
		parent::__construct(); 
             

		$this->listarPermisos();
      }
      private function listarPermisos(){
      	if (!isLogged())
      		return;
      	$usuario 	= new Usuario($this->session->userdata('user')->id);


      	$privilegios 	= $usuario->privilegio->get();
      	$this->data['privilegios'] = array();
      	foreach($privilegios->all as $privilegio)
      		$this->data['privilegios'][$privilegio->identificador] = $privilegio->stored;

      	
      }

} 
