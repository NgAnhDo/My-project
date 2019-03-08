<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Do_edit extends CI_Controller {

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
		$this->load->view('editSlides_view', $dl, FALSE);
	}
	function editSlide()
	{
		$title=$this->input->post('title');
		$drescription=$this->input->post('drescription');
		$button_link=$this->input->post('button_link');
		$button_text=$this->input->post('button_text');
		
		$cacanh=$_FILES["slides_image"]["name"];//luu tru ten file
		$filevatly=$_FILES["slides_image"]["tmp_name"];//luu file that
		$slides_image = array();
		$slides_image_old=$this->input->post('slides_image_old');
		//duyet mang de lay dc tung file anh
		for ($i = 0; $i < count($cacanh); $i++) 
		{
			if (empty($cacanh[$i])) 
			{
				$slides_image[$i]=$slides_image_old[$i];
			}
			else
			{
				$duongdan='filesupload/'. $cacanh[$i];
				move_uploaded_file($filevatly[$i], $duongdan);
				$slides_image[$i]=base_url().'filesupload/'.$cacanh[$i];
			}
		}
		$tatcaslide = [];
		for ($i = 0; $i <count($title) ; $i++) 
		{
			$tam=[];
			$tam['title']=$title[$i];
			$tam['drescription']=$drescription[$i];
			$tam['button_link']=$button_link[$i];
			$tam['button_text']=$button_text[$i];
			$tam['slides_image']=$slides_image[$i];
			array_push($tatcaslide, $tam);
		}
		$tatcaslide=json_encode($tatcaslide);
		$this->load->model('slides_model');
		if ($this->slides_model->updateSlides($tatcaslide)) 
		{
			$this->load->view('thanhcong');
		}
	}
}

/* End of file Do_edit.php */
/* Location: ./application/controllers/Do_edit.php */