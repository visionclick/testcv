<?
class MY_Controller extends CI_Controller {
	public $data = array();

	function __construct($requiereLogin = false){
		parent::__construct();

	}
	function requiereLogin(){
		if (!isLogged())
			redirect('/');
	}
} 
	