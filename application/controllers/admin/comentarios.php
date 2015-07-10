<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Comentarios extends MY_AdminController {

	function __construct(){
		parent::__construct();
		//ini_set("display_errors",1);
		if (!isLogged())
			redirect('admin/inicio');
		$this->data['menuActual'] = 'comentarios';

	}

	public function index()
	{
	


	}
	public function listado(){



	
	}
	
	public function edicion($id=null)
	{

	
	
	
	}
	public function guardar()
	{


	
	
	}

	public function eliminar($idcomentario)
	{

	} 
	
}

