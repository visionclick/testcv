<?php

class Privilegio extends DataMapper {
	var $model 	= 'privilegio';
	var $table 	= 'privilegios';

	var $has_one = array();
	var $has_many = array('usuario');
}