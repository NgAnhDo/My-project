<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slides_model');
	}

	public function index()
	{
		$this->load->view('addData_view');
	}
	function addSlides()
	{
		$dl=$this->slides_model->laydulieu();
		$dl=json_decode($dl,true);
		if($dl==Null)
		{
			
			$dl=array();
		}
		
		//upload file
			$target_dir = "filesupload/";
			$target_file = $target_dir . basename($_FILES["slides_image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["slides_image"]["tmp_name"]);
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
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// Check file size
			// if ($_FILES["slides_image"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["slides_image"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["slides_image"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

		$title=$this->input->post('title');
		$drescription=$this->input->post('drescription');
		$button_link=$this->input->post('button_link');
		$button_text=$this->input->post('button_text');
		$slides_image=base_url(). 'filesupload/'. basename($_FILES["slides_image"]["name"]);
		
		$motslidesanh = 
		[
			'title'=>$title,
			'drescription'=>$drescription,
			'button_link'=>$button_link,
			'button_text'=>$button_text,
			'slides_image'=>$slides_image
		];
		array_push($dl, $motslidesanh);
		$dl=json_encode($dl);
		if ($this->slides_model->updateSlides($dl)) 
		{
			$this->load->view('thanhcong');
		}
	}
	function xoaSlides()
	{
		$this->load->view('deSlides_view');
	}

}

/* End of file Slides.php */
/* Location: ./application/controllers/Slides.php */