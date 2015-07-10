<?php

class Comentario extends DataMapper {

	var $model 		= 'comentario';
	var $table 		= 'comentarios';

	var $has_one = array();
	var $has_many = array('noticia');

	
	var $default_order_by = array('id');


    function __construct($id = NULL)
	{
		parent::__construct($id);
  	}

	


	
}