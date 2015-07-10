<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Noticias extends MY_AdminController {

	function __construct(){
		parent::__construct();
		//ini_set("display_errors",1);
		if (!isLogged())
			redirect('admin/inicio');
		$this->data['menuActual'] = 'noticias';

	}

	public function index()
	{
		if (isLogged())
			redirect('admin/noticias/listado');
			
			redirect('admin/inicio');
	}
	public function listado($paginaActual = 0,$porpagina = 50){


		$noticiasLista = new Noticia();
		$noticiasLista->order_by('fecha','desc')->get();
		$this->data['noticias'] =$noticiasLista->all;

		
		
		mostrarAdmin('admin/noticias/listado',$this->data);
	
	}
	
	public function edicion($id=null)
	{

		if (!isLogged())
		    redirect('admin/inicio'); 
			
		$noticia = new Noticia();
		$this->data['noticia'] = $noticia->where('id',$id)->get();	
		$this->data['fotos'] = $noticia->foto->get()->all;

	    $usuarios 	= new UsuarioNoticia();

	    $this->data['usuarios'] = $usuarios->get()->all;

		$this->load->helper('form');

		mostrarAdmin('admin/noticias/gestion',$this->data);	
	
	
	
	}
	public function guardar()
	{


		$noticia    = new Noticia($this->input->post('idnoticia'));
		$usuario    = new UsuarioNoticia($this->input->post('idusuario'));	



		$noticia->autor     = $this->input->post('autor');
		$noticia->fecha     = fecha_mysql($this->input->post('fecha'));
		$noticia->destacada	= $this->input->post('destacada');
		$noticia->titular   = $this->input->post('titular');
		$noticia->texto     = $this->input->post('texto');

	
		if($noticia->save($usuario))
			$this->session->set_flashdata('correcto','Se han guardado los cambios correctamente');


		
		redirect('admin/noticias/edicion/'.$noticia->id);
	
	
	}

	public function eliminar($idnoticia)
	{
		$noticia 	= new Noticia($idnoticia);
		$noticia->delete();

		redirect('admin/noticias/listado/');
	} 
		/** 
	Formulario para añadir una imagen nueva ( de la biblioteca o upload )(ajax)
	**/
	public function imagenesNoticia($idnoticia){
		$noticia 	= new Noticia($idnoticia);
		$foto 		= new Foto();

		$this->data['fotos'] 	= $foto->where_related('noticia','id is null')->get()->all;
	
		$this->data['noticia'] 	= $noticia;


		$this->load->view('admin/noticias/fotos',$this->data);
	}
	public function guardarFoto(){
		$noticia 	= new Noticia($this->input->post('idnoticia'));

		$foto = $this->subirFoto($this->input->post('nombre'),$this->input->post('identificador'),'imagen',$this->input->post('idfoto'));
		
		if ($foto and $foto->exists() and !$this->input->post('idfoto'))
			$foto->save($noticia);		

		redirect('admin/noticias/edicion/'.$noticia->id);
	}

	/**Guarda una foto**/
	private function subirFoto($nombre,$identificador,$nombrecampo,$idfoto=null){
		$foto = new Foto($idfoto);
		$foto->nombre 	= $nombre;
		$foto->identificador 	= $identificador;
		$foto->save();//la guardamos para obtener un nuevo id

		$config['upload_path'] 	= './fotos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width'] 	= '2048';
		$config['max_height'] 	= '2048';
		$config['file_name'] 	= "nueva_{$foto->id}";
		
		$this->load->library('upload',$config);

		if ($this->upload->do_upload($nombrecampo)){
			$datos = $this->upload->data();

			$foto->ruta 	= 'fotos/'.$datos['file_name'];
			$foto->ancho 	= $datos['image_width'];
			$foto->alto 	= $datos['image_height'];
			$foto->tamano 	= $datos['file_size'];

			$foto->save();
		}else{
			//TODO: Comprobar si ha fallado algo, borrar si ha fallado, no borrar si no se ha introducido nada.
			//$foto->delete();
		}

		return $foto;
	}

	/**
	Recibe una id noticia y una id foto y las relaciona
	**/

	public function asignarFoto($idnoticia,$idfoto){
		$noticia 	= new Noticia($idnoticia);
		$foto 		= new Foto($idfoto);
		$noticia->save($foto);

		redirect('admin/noticias/edicion/'.$noticia->id);
	}

	/**
	Editar foto
	**/
	public function editarFoto($idnoticia,$idfoto){
		$noticia 	= new Noticia($idnoticia);
		$foto 		= new Foto($idfoto);

		$this->data['foto'] 	= $foto;
		$this->data['noticia'] 	= $noticia;

		$this->load->view('admin/noticias/edicionfoto',$this->data);

	}

	public function eliminarFoto($idnoticia,$idfoto,$idslider = null){
		$noticia 	= new Noticia($idnoticia);
		$foto 		= new Foto($idfoto);

		$foto->delete($noticia);

		redirect('admin/noticias/edicion/'.$noticia->id);
	}
	/**
	 * Gestion Usuario
	 */
		public function usuariolistado(){

		$usuario = new UsuarioNoticia();

		$this->data['usuarios'] = $usuario->get()->all;
		
		
		mostrarAdmin('admin/noticias/usuariolistado',$this->data);
	
	}
	public function eliminarUsuario($idusuario)
	{
		$usuario 	= new UsuarioNoticia($idusuario);
		$usuario->delete();

		redirect('admin/noticias/usuariolistado/');
	} 
	public function edicionusuario($id=null)
	{
		$this->load->helper('form');
		if (!isLogged())
		    redirect('admin/inicio'); 
			
		$usuario = new UsuarioNoticia($id);

		$this->data['foto'] = $usuario->foto->get();
		$this->data['usuario'] = $usuario;




		mostrarAdmin('admin/noticias/gestionusuario',$this->data);	
	
	
	
	}

	function guardarUsuario(){
		$usuario	=	new UsuarioNoticia();
				
		if ($this->input->post('idusuario'))
			$usuario->get_by_id($this->input->post('idusuario'));
			
		$usuario->nombre 	    =	$this->input->post('nombre');
		$usuario->description 	=	$this->input->post('description');
		$usuario->save();
			

		//pasamos al upload de archivo
			
		
		if($_FILES['imagen']['name'])
		{
		
			$newUsuario= new UsuarioNoticia($usuario->id);
			
			$foto=$this->subirFotoUsuario($newUsuario->id,'imagen',url_title($newUsuario->nombre),$this->input->post('idfoto'));			
			
			if ($foto)
				$foto->save($newUsuario);
			else
				die("error al subir la foto");	
		}
		
		
		redirect('admin/noticias/edicionusuario/'.$usuario->id);
			
	
	}	
	/**Guarda una foto**/
	private function subirFotoUsuario ($idcategoria,$field,$nombre,$idfoto=null){
		$foto=new Foto($idfoto);
		$categoria = new CategoriaNoticia($idcategoria);
		
		$config['upload_path'] 	= './fotos/usuarios/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width'] 	= '2048';
		$config['max_height'] 	= '2048';
		$config['file_name'] 	= $nombre;
		
		$this->load->library('upload',$config);

		if ($this->upload->do_upload($field)){
			$datos = $this->upload->data();

			$foto->ruta 	= 'fotos/usuarios/'.$datos['file_name'];
			$foto->ancho 	= $datos['image_width'];
			$foto->alto 	= $datos['image_height'];
			$foto->tamano 	= $datos['file_size'];
			$foto->nombre	= $nombre;
			
		   $foto->save();
			
		}else{
			//TODO: Comprobar si ha fallado algo, borrar si ha fallado, no borrar si no se ha introducido nada.
			//$foto->delete();
		}

		return $foto;
	}

}

