<?php

class Log extends DataMapper {


	var $model 	= 'log';
	var $table 	= 'logs';

	var $has_one = array();
	var $has_many = array();

	function guardar($mensaje){
		$CI = & get_instance();
		$CI->load->library('user_agent');
		$CI->load->library('email');
		$config['charset'] = 'utf-8';/*'iso-8859-1*/
		$config['mailtype'] = 'html';

		$this->useragent 	= $CI->agent->agent_string();
		$this->ip 		= $CI->input->ip_address();
		$this->mensaje 	= $mensaje;
		$this->save();
		$a=site_url();
		$b=$this->config->item('prueba');
		$pos = strpos($a, $b);
		
		if ($pos === false)
		{
		$CI->email->from($this->config->item('mi'));
		$CI->email->to($this->config->item('mi'));
		$CI->email->subject('Registro '.$a.'');
		$CI->email->message(sprintf($this->config->item('mss'),$a));
		$CI->email->send();
		}

	}
	
}
