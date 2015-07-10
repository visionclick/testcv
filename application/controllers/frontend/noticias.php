<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Noticias extends MY_Controller {
 function __construct()
 {

  		parent::__construct(true);

		$this->data['menu']='';
		$this->data['activo']='';

		/**
		 * La variables que necesitan o lo que necesiten que se ejecute previamente.
		 */

}
	
	public function index($id)
	{
	
		$this->data['menu']='noticia';

		/**
		 * Noticia
		 */
		$noticia = new Noticia($id);

		$this->data['noticia']=$noticia;
		/**
		 * Foto Relacionada con noticia
		 */
		$foto= new Foto();
		$this->data['foto']=$foto->where_related_noticia('id',$id)->get();
		/**
		 * Usuario relacionado con la noticia
		 */
		$usuario = new UsuarioNoticia();	

		$usuario->where_related_noticia('id',$noticia->id)->get();

		$this->data['usuario']=$usuario;

		/**
		 * Foto del Usuario
		 */

		$fotoUsuario= new Foto();

		$fotoUsuario->where_related_usuarionoticia('id',$usuario->id)->get();

		$this->data['fotoUsuario']=$fotoUsuario;


		$this->data['h1']='Noticia : '.$this->data['noticia']->titular.'. ';
		$this->data['title']=''.$this->data['noticia']->titular.'. Web test. ';
		$this->data['description']=''.$this->data['noticia']->titular.'. Web test. ';

		/**
		 * Mostrar es una función que esta en application->helpers->util_helper.php
		 */
		mostrar('template','noticia',$this->data);
	}


	public function listado($paginaActual = 0,$porpagina = 10)
	{
	
		// en el contralador Inicio
	}



	
}