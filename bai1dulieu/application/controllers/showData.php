<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('showData_view');
	}

}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */