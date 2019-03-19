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
	function suadanhmuc($id)
	{
		$this->load->model('tin_model');
		$dl=$this->tin_model->getData($id);
		$dl=array('mangdulieu'=>$dl);
		$this->load->view('sua_view', $dl);

	}
	function updateDanhmuc()
	{
		$id=$this->input->post('id');
		$tendanhmuc=$this->input->post('tendanhmuc');
		// $dltrave=array(
		// 	'id'=>$id,
		// 	'tendanhmuc'=>$tendanhmuc
		// )
		$this->load->model('tin_model');
		if ($this->tin_model->upDate($id,$tendanhmuc))
			{
				echo 'thanhcong';
			};
	}
	function delDanhmuc($id)
	{
		$this->load->model('tin_model');
		if ($this->tin_model->delData($id)) {
			echo 'thanhcong';
			
		}
	}
	function addAjax()
	{
		$tendanhmuc=$this->input->post('tendanhmuc');
		$this->load->model('tin_model');
		$this->tin_model->insertDanhmuc($tendanhmuc);
		$id=json_encode($this->db->insert_id());
		echo $id;
		die();
		
	}
	function tintuc()
	{
		$this->load->model('tin_model');
		$kq1=$this->tin_model->loadDanhmuc();
		$kq2=$this->tin_model->loadTinTuc();
		$kq=array('mangkq'=>$kq1,
			'mangtintuc'=>$kq2
	);
		
		$this->load->view('tin_view', $kq);

	}
	function themmoitin()
	{

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        // echo "File is not an image.";
		        // $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    // $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["anhtin"]["size"] > 500000) {
		    // echo "Sorry, your file is too large.";
		    // $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    // $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}
		$anhtin1= base_url()."uploads/".basename( $_FILES["anhtin"]["name"]);
		$anhtin=basename( $_FILES["anhtin"]["name"]);
		if (empty($anhtin)) {
			$anhtin=$anhtin;
		}
		else {
			$anhtin=$anhtin1;
		}
		$tieude=$this->input->post('tieude');
		$iddanhmuc=$this->input->post('iddanhmuc');
		$noidungtin=$this->input->post('noidungtin');
		$trichdan=$this->input->post('trichdan');
		$this->load->model('tin_model');
		if ($this->tin_model->insertTin($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)) 
		{
			echo 'thanh cong';
		}
	}
	function suaTin($id)
	{
		$this->load->model('tin_model');
		$dl=$this->tin_model->loadDanhmuc();
		$kq1=$this->tin_model->getTin($id);
		$tendanhmuc=$this->tin_model->getTenDanhMucById($id);
		
		$kq=array('suamangtintuc'=>$kq1,
					'mangtendm'=>$tendanhmuc,
					'mangdulieu'=>$dl
		);
		$this->load->view('suaTin_view', $kq, FALSE);

	}
	function updateTin()
	{

		$anhtincu=$this->input->post('anhtincu');
		$anhtin=$_FILES["anhtin"]["name"];

		if (empty($anhtin)) {
			$anhtin=$anhtincu;
		}
		else{
			$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        // echo "File is not an image.";
		        // $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    // $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["anhtin"]["size"] > 500000) {
		    // echo "Sorry, your file is too large.";
		    // $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    // $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}
		$anhtin= base_url()."uploads/".basename( $_FILES["anhtin"]["name"]);
		}
		$tieude=$this->input->post('tieude');
		$iddanhmuc=$this->input->post('iddanhmuc');
		$noidungtin=$this->input->post('noidungtin');
		$trichdan=$this->input->post('trichdan');
		$id=$this->input->post('id');
		$this->load->model('tin_model');
		if ($this->tin_model->editTinById($id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)) 
		{
			echo 'thanh cong';
		}
	}
	function xoaTin($id)
	{
		$this->load->model('tin_model');
		if ($this->tin_model->delTin($id)) {
			echo 'xoa thanhcong';
		}
	}
}

/* End of file Tin.php */
/* Location: ./application/controllers/Tin.php */