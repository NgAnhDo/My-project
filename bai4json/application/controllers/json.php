<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('json_model');
	}

	public function index()
	{
		
		// $motcontact1=array(
		// 	'ten'=>'do',
		// 	'sdt'=>'0947876650'
		// );
		// $caccontact=array();
		// array_push($caccontact, $motcontact1);
		
		// $motcontact2=array(
		// 	'ten'=>'do2',
		// 	'sdt'=>'0947876650'
		// );
		
		// array_push($caccontact, $motcontact2);
		// $noidungdamahoa=json_encode($caccontact);

		// // echo '<pre>';
		// // var_dump($caccontact);
		// // echo '</pre>';
		// $this->load->model('json_model');
		// echo $this->json_model->insertData('contact',$noidungdamahoa);
		
		$ketqua=$this->json_model->showData();
		$ketqua=json_decode($ketqua,true);
		$ketqua = array('mangkq'=>$ketqua);
		$this->load->view('json_view', $ketqua, FALSE);
	}
	function xoa_json($sdt)
	{
		
		$dulieu=$this->json_model->showData();
		$dulieu=json_decode($dulieu,true);
		
		foreach ($dulieu as $key => $value) 
			if($value['sdt']==$sdt)
		{
			unset($dulieu[$key]);
		}
		$dulieu=json_encode($dulieu);
		
		
		if ($this->json_model->updateData($dulieu)) 
		{
		 	$this->load->view('thanhcong');
		 }
	}
	function add_json()
	{
		$ten=$this->input->post('ten');
		$sdt=$this->input->post('sdt');
		$dulieu=$this->json_model->showData();
		$dulieu=json_decode($dulieu,true);
		$con = [
		    'ten' =>$ten,
		    'sdt' =>$sdt
		];
		array_push($dulieu, $con);
		$dulieu=json_encode($dulieu);
		if ($this->json_model->updateData($dulieu)) 
		{
		 	$this->load->view('thanhcong');
		} 
		
	}
}

/* End of file json.php */
/* Location: ./application/controllers/json.php */