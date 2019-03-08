<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('addData_view');
	}
	public function insertData()
	{
		echo  $this->input->post('so');
		echo  $this->input->post('gia');
	}

}

/* End of file addData.php */
/* Location: ./application/controllers/addData.php */