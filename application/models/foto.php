<?php

class Foto extends DataMapper {


	var $model 	= 'foto';
	var $table 	= 'fotos';

	var $has_one = array();
	var $has_many = array('noticia','usuarionoticia');
	var $default_order_by = array('id' =>'asc');


	public function rutaCompleta(){
		return site_url($this->ruta);
	}
	public function rutaMiniatura($ancho,$alto,$crop){
		return site_url("imagenes/generarTemporal/$ancho/$alto/$crop/".$this->ruta);
		
	}
}
