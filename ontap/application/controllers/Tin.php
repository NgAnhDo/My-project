<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	public function danhmuctin()
	{	
		$this->load->model('tin_model');
		$kq=$this->tin_model->loadDanhmuc();
		$kq=array('dulieu'=>$kq);
		$this->load->view('danhmuctin_view',$kq);

	}
	function themtin()
	{
		$tendanhmuc=$this->input->post('tendanhmuc');
		$this->load->model('tin_model');
		if ($this->tin_model->insertDanhmuc($tendanhmuc))
		 {
			echo 'thanhcong';
		}
	}
}

/* End of file Tin.php */
/* Location: ./application/controllers/Tin.php */