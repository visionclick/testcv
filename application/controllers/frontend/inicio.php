<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MY_Controller {
 function __construct()
 {

  		parent::__construct(true);

		$this->data['enviado']= $this->session->flashdata('enviado');
		$this->correo = "josecarlos@visionclick.es";//esta en config modules.php
		$this->web="Test CV";
		
}


	public function index()
	{
		

		$noticias= new Noticia();

		$this->data['noticias'] = $noticias->order_by('fecha','desc')->get()->all;

		mostrar('template','portada',$this->data);
	}
	
	

}