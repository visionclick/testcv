<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Inicio extends MY_AdminController {

	public function index()
	{
		/*$usuario = new Usuario(1);
		$usuario->password = crypt('Tedacuen2014','mr%fsdfOk5ad');
		$usuario->save();*/

		
		$this->data['menuActual'] = 'inicio';

		$this->load->view('admin/template/login_template',$this->data);
		if (isLogged())
			redirect('admin/inicio/bienvenida');
	}
	public function bienvenida(){
		$this->requiereLogin();
		$this->data['menuActual'] = 'inicio';

		mostrarAdmin('admin/bienvenida',$this->data);
	}

	public function loguear(){
		$log = new Log();

		$usuario 	= $this->input->post('usuario');
		$password 	= $this->input->post('password');

		$user = new Usuario();
		$user->where('usuario',$usuario)->where('password',crypt($password,'mr%fsdfOk5ad'))->get();

		if ($user->exists()){
			$datos['user'] = $user->stored;
			$this->session->set_userdata($datos);
			$log->guardar('Acceso correcto de '.$user->usuario.' al panel de control.');

			redirect('admin/inicio/bienvenida');
		}
		else{
			$this->session->set_flashdata('error','No existe ningún usuario con esas credenciales. ');
			$log->guardar('Acceso erroneo con el user '.$usuario.' al panel de control.');		     
			redirect('admin/');
		}
	}
	public function salir(){
		$this->session->sess_destroy();
		redirect('admin/');
	}
}

