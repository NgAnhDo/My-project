<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('xuLy_model');
		$dl=$this->xuLy_model->getData();
		$dl=json_decode($dl,true);
		$dl = [
		    'mangdl' =>$dl 
		];
		$this->load->view('home_view',$dl,FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */