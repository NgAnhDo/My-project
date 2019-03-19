<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
class News extends CI_Controller {
	private $sotinmottrang;
	public function __construct()
	{
		parent::__construct();
		$this->sotinmottrang=2;
	}

	public function index()
	{
		
	}
	function newsFrontEnd()
	{
		$this->load->model('tin_model');
		$kq=$this->tin_model->LoadTinFrontEnd($this->sotinmottrang);
		$sotrang=$this->tin_model->soTrang($this->sotinmottrang);
		$danhmuc=$this->tin_model->loadDanhmuc();
		$kq1=array('dulieu'=>$kq,
					'sotrang'=>$sotrang,
					'cacdanhmuc'=>$danhmuc
		);
		$this->load->view('news_view',$kq1);
	}
	function page($trang)
	{
		$this->load->model('tin_model');
		$kq=$this->tin_model->loadTinTheoTrang($trang,$this->sotinmottrang);
		$sotrang=$this->tin_model->soTrang($this->sotinmottrang);
		$danhmuc=$this->tin_model->loadDanhmuc();
		$kq1=array('dulieu'=>$kq,
					'sotrang'=>$sotrang,
					'cacdanhmuc'=>$danhmuc
		);
		$this->load->view('news_view',$kq1);
	}
	function chiTietTin($idtin)
	{
		$this->load->model('tin_model');
		$dl=$this->tin_model->getTin($idtin);
		$danhmuc=$this->tin_model->loadDanhmuc();
		$iddanhmuc=$this->tin_model->getIdDanhMucById($idtin);

		$tinlienquan=$this->tin_model->LoadTinLienQuan($this->sotinmottrang,$iddanhmuc,$idtin);

	
		$dl=array('mangtinchitiet'=>$dl,
				'cacdanhmuc'=>$danhmuc,
				'tinlienquan'=>$tinlienquan);
		$this->load->view('news_detail', $dl, FALSE);
	}
	function danhMuc($iddm)
	{
		
		$this->load->model('tin_model');
		$kq=$this->tin_model->LoadTinTheoDM($this->sotinmottrang,$iddm);
		$sotrang=$this->tin_model->soTrang($this->sotinmottrang);
		$danhmuc=$this->tin_model->loadDanhmuc();
		$kq1=array('dulieu'=>$kq,
					'sotrang'=>$sotrang,
					'cacdanhmuc'=>$danhmuc
		);
		$this->load->view('news_view',$kq1);

	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */