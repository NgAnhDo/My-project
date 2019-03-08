<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xuly extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('xuLy_model');
	}

	public function index()
	{	
		
		$this->load->view('hieuung_view');
	}
	function addData()
	{

			$dl=$this->xuLy_model->getData();
			
			
			$dl=json_decode($dl,true);
			if ($dl==null) 
			{
				$dl=array();
			}

				$target_dir = "file/";
				$target_file = $target_dir . basename($_FILES["upload_img"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["upload_img"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}
			
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) 
				    {
				       // echo "The file ". basename( $_FILES["upload_img"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}

			$title=$this->input->post('title');
			$text=$this->input->post('text');
			$link_button=$this->input->post('link_button');
			$text_button=$this->input->post('text_button');
			$upload_img=base_url().'file/'.basename($_FILES["upload_img"]["name"]);

			//tao ra array 1 slide anh
			$motslidesanh=array(
				'title'=>$title,
				'text'=>$text,
				'link_button'=>$link_button,
				'text_button'=>$text_button,
				'upload_img'=>$upload_img	
			);

			
			array_push($dl, $motslidesanh);
			$dl=json_encode($dl);
			if ($this->xuLy_model->updateData($dl)) 
			{
				$this->load->view('thanhcong');
			}

				//upload anh
		
	
		
	}
	
}

/* End of file Xuly.php */
/* Location: ./application/controllers/Xuly.php */