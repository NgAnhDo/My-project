<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xoa_Slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('slides_model');
		$dl=$this->slides_model->laydulieu();
		$dl=json_decode($dl,true);
		$dl = array('mangdl'=>$dl);
		$this->load->view('delSlides_view', $dl, FALSE);
	}
	function delSildes($td)
	{
		$this->load->model('slides_model');
		$dl=$this->slides_model->laydulieu();
		$dl=json_decode($dl,true);
		
		foreach ($dl as $key => $value) 
			if($value['title']==$td)
		{
			unset($dl[$key]);
		}
		$dl=json_encode($dl);
		
		$this->load->model('slides_model');
		if ($this->slides_model->updateSlides($dl)) 
		{
			//$this->load->view('thanhcong');
		}
	}
}

/* End of file Xoa_Slide.php */
/* Location: ./application/controllers/Xoa_Slide.php */