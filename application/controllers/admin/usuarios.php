<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuarios extends MY_AdminController {

	function __construct(){
		parent::__construct();
		if (!isLogged())
			redirect('admin/inicio');
			
		$this->data['menuActual'] = 'usuarios';
	}

	public function index()
	{
		redirect('admin/usuarios/listado');
	}

	public function listado()
	{
		$usuarios = new Usuario();
		if ($this->session->userdata('user')->id != 1)
			$usuarios->where('usuario !=','admin');

		$this->data['usuarios'] = $usuarios->get()->all;
		mostrarAdmin('admin/usuarios/listado',$this->data);
	}

	public function edicion($idusuario = null){
	
		$yo 		= new Usuario($this->session->userdata('user')->id);
		$usuario 	= new Usuario($idusuario);
		$privilegios	= new Privilegio();


		$this->data['usuario'] = $usuario;

		if ($yo->id == 1)
			$this->data['todosprivilegios'] = $privilegios->get()->all;
		else
			$this->data['todosprivilegios'] = $yo->privilegio->get()->all;

		mostrarAdmin('admin/usuarios/edicion',$this->data);
	}

	public function guardar(){
		$arrayprivilegios = $this->input->post('privilegios');
		$usuario = new Usuario($this->input->post('idusuario'));
		$password = $this->input->post('password');

		if ($usuario->exists()){
			if (!empty($password))
				$usuario->password = crypt($password,'mr%fsdfOk5ad');
				
		}else
			$usuario->password = crypt($password,'mr%fsdfOk5ad');

		$usuario->usuario 	= $this->input->post('usuario');
		$usuario->email 	= $this->input->post('email');

		$usuario->save();
		//guardamos los privilegios...

		$privilegios = new Privilegio();
		$privilegios->get();

		$usuario->delete($privilegios->all);//borramos todos...

		foreach($arrayprivilegios as $idprivilegio){
			$privilegio = new Privilegio($idprivilegio);
			$usuario->save($privilegio);
		}




		redirect('admin/usuarios/listado');	
	}

	public function eliminar($idusuario){
		if ($idusuario != 1){
			$usuario = new Usuario($idusuario);
			$usuario->delete();
		}
		redirect('admin/usuarios/listado');	
	}

}

