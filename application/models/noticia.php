<?php

class Noticia extends DataMapper {


	var $model 	= 'noticia';
	var $table 	= 'noticias';

	var $has_one = array('usuarionoticia');
	var $has_many = array('foto','comentario');//

	var $default_order_by = array('fecha' =>'desc');

}
