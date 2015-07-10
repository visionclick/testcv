<?php

class Usuario extends DataMapper {


	var $model 	= 'usuario';
	var $table 	= 'usuarios';

	var $has_one = array();
	var $has_many = array('privilegio');


}
