<?php

class Usuarionoticia extends DataMapper {

	var $model 		= 'usuarionoticia';
	var $table 		= 'usuariosnoticias';

	var $has_one = array('foto');
	var $has_many = array('noticia');

	
	var $default_order_by = array('id');


    function __construct($id = NULL)
	{
		parent::__construct($id);
  	}

	


	
}