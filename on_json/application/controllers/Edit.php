<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

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
		
		$this->load->view('edit_view', $dl, FALSE);
	}
	function editData()
	{
		$title=$this->input->post('title');
		$text=$this->input->post('text');
		$link_button=$this->input->post('link_button');
		$text_button=$this->input->post('text_button');


		$upload_img_old=$this->input->post('upload_img_old');
		$cacanh=$_FILES["upload_img"]["name"];
		$filevatly=$_FILES["upload_img"]["tmp_name"];
		$upload_img=array();
		for ($i = 0; $i < count($cacanh) ; $i++) 
		{
			if (empty($cacanh[$i])) 
			{
				$upload_img[$i]=$upload_img_old[$i];
			}
			else
			{
				$duongdan='file/'.$cacanh[$i];
				move_uploaded_file($filevatly[$i], $duongdan);
				$upload_img[$i]=base_url().'file/'.$cacanh[$i];

			}
		}
		$tatcaslide=array();
		for ($i = 0; $i <count($title) ; $i++) 
		{
			$temp=array();
			$temp['title']=$title[$i];
			$temp['text']=$text[$i];
			$temp['link_button']=$link_button[$i];
			$temp['text_button']=$text_button[$i];
			$temp['upload_img']=$upload_img[$i];
			array_push($tatcaslide, $temp);
		}
		$tatcaslide=json_encode($tatcaslide);
		$this->load->model('xuLy_model');
		if ($this->xuLy_model->updateData($tatcaslide)) {
			$this->load->view('thanhcong');
		}
		
	}
	function delSildes($khoa)
	{
		$this->load->model('xuLy_model');
		$dl=$this->xuLy_model->getData();
		$dl=json_decode($dl,true);
		foreach ($dl as $key => $value) 
			if($key==$khoa)
		{
			unset($dl[$key]);
		}
		$dl=json_encode($dl);
		
		$this->load->model('xuLy_model');
		if ($this->xuLy_model->updateData($dl)) {
			$this->load->view('thanhcong');
		}
	}
}
/* End of file Edit.php */
/* Location: ./application/controllers/Edit.php */