<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->load->view('nhansu_view');
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getAllData();
		$ketqua=array("mangketqua"=>$ketqua);
		//truyen du lieu sang viet
		$this->load->view('nhansu_view', $ketqua, FALSE);
	}
	function nhansu_add()
	{
		//lay du liệu từ view
		

		
		// Hàm upload file (ảnh)
		
			$target_dir = "file_upload/";
			$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Ảnh đã tồn tại";
			//     $uploadOk = 0;
			// }
			// Check file size
			if ($_FILES["anhavatar"]["size"] > 50000000) {
			    //echo "Kích thước ảnh quá lớn";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Chỉ upload các định dạng ảnh JPG, JPEG, PNG & GIF ";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    //echo "File không thể upload";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
			    } else {
			        echo "Xảy ra lỗi trong quá trình upload file";
			    }
			}
			// echo "<br>";
			$anhavatar= base_url().'file_upload/'.$_FILES["anhavatar"]["name"];
			$ten=$this->input->post('ten');
			$tuoi=$this->input->post('tuoi');
			$sdt=$this->input->post('sdt');
			$linkfb=$this->input->post('linkfb');
			$sodonhang=$this->input->post('sodonhang');
			//Gọi model
			$this->load->model('nhansu_model');
			if ($this->nhansu_model->insertDataToMySql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)) 
			{
				$this->load->view('add_nhansu_thanhcong_view');
			}
			else 
			{
				echo 'inset that bai';
			}
	}
	function edit_nhansu($idnhandc)
	{
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getDataById($idnhandc);//dua vao id lay ra du lieu
		// đưa dư liệu sang view sửa
		$ketqua=array("dulieu_nv"=>$ketqua);
		$this->load->view('edit_nhanvien_view', $ketqua, FALSE);
	}
	function update_nhansu()
	{
		//lấy dữ liệu từ view
		$id=$this->input->post('id');
		
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$linkfb=$this->input->post('linkfb');
		$sodonhang=$this->input->post('sodonhang');
		//xử lý ảnh upload

		$target_dir = "file_upload/";
			$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Ảnh đã tồn tại";
			//     $uploadOk = 0;
			// }
			// Check file size
			if ($_FILES["anhavatar"]["size"] > 50000000) {
			    //echo "Kích thước ảnh quá lớn";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Chỉ upload các định dạng ảnh JPG, JPEG, PNG & GIF ";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    //echo "File không thể upload";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
			    } else {
			        echo "Xảy ra lỗi trong quá trình upload file";
			    }
			}
		//$anhavatar= base_url().'file_upload/'.$_FILES["anhavatar"]["name"];
		$anhavatar= basename($_FILES["anhavatar"]["name"]);
		//kiếm tra điều kiện,nếu có upload ảnh thì lấy ảnh đó
		//nếu ko có load ảnh mới thì lấy anhavatar2

		if ($anhavatar) 
		{
			$anhavatar=base_url().'file_upload/'.$_FILES["anhavatar"]["name"];
			//$anhavatar=$this->input->post('anhavatar');
			
		}
		else
		{
			$anhavatar=$this->input->post('anhavatar2');
			
		}
		//gọi luôn model
		$this->load->model('nhansu_model');
		if ($this->nhansu_model->updateDataToMySql($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)) 
		{
			$this->load->view('update_thanhcong_view');
		}
		else {
			echo 'that bai';
		}
	}
	function xoa_nhansu($idnhandc)
	{
		$this->load->model('nhansu_model');
		if ($this->nhansu_model->delDataById($idnhandc)) 
		{
			echo "xoa thanh cong";
		}
		else {
			echo "xoa that bai";
		}
	}
	function ajax_add()
	{
			
			//$anhavatar= base_url().'file_upload/'.$_FILES["anhavatar"]["name"];
			$ten=$this->input->post('ten');
			$tuoi=$this->input->post('tuoi');
			$sdt=$this->input->post('sdt');
			$anhavatar=$this->input->post('anhavatar');
			$linkfb=$this->input->post('linkfb');
			$sodonhang=$this->input->post('sodonhang');
			//Gọi model
			$this->load->model('nhansu_model');
			if ($this->nhansu_model->insertDataToMySql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)) 
			{
				echo 'thành công';
				//$this->load->view('add_nhansu_thanhcong_view');
			}
			else 
			{
				echo 'inset that bai';
			}
	}
	function uploadfile()
	{
		$uploadfile=new UploadHandler();
	}
}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */