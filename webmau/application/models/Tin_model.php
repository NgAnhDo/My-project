<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	function insertDanhmuc($tendanhmuc)
	{
		$dl=array(
			'tendanhmuc'=>$tendanhmuc
		);
		return $this->db->insert('danhmuctin', $dl);
	}
	function loadDanhmuc()
	{
		$this->db->select('*');
		$dl=$this->db->get('danhmuctin');
		$dl=$dl->result_array();
		return $dl;
	}
	function getData($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dl=$this->db->get('danhmuctin');
		$dl=$dl->result_array();
		return $dl;
	}
	function upDate($id,$tendanhmuc)
	{
		$dl=array(
			'id'=>$id,
			'tendanhmuc'=>$tendanhmuc
		);
		$this->db->where('id',$id);
		return $this->db->update('danhmuctin', $dl);
	}
	function delData($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('danhmuctin');
		
	}
	function insertTin($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		$dl=array(
			'tieude'=>$tieude,
			'iddanhmuc'=>$iddanhmuc,
			'noidungtin'=>$noidungtin,
			'anhtin'=>$anhtin,
			'trichdan'=>$trichdan
		);
	return	$this->db->insert('tintuc', $dl);
		 // $this->db->insert_id();
	}
	function loadTinTuc()
	{
		$this->db->select('*');
		$dl=$this->db->get('tintuc');
		$dl=$dl->result_array();
		return $dl;
	}
	function editTinById($id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		
		$dl=array(
			'id'=>$id,
			'tieude'=>$tieude,
			'iddanhmuc'=>$iddanhmuc,
			'noidungtin'=>$noidungtin,
			'anhtin'=>$anhtin,
			'trichdan'=>$trichdan
		);
		$this->db->where('id', $id);
		return $this->db->update('tintuc', $dl);
	}
	function getTin($id)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$dl=$this->db->get('danhmuctin');
		$dl=$dl->result_array();
		return $dl;
	}
	function getTenDanhMucById($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$kq=$this->db->get();
		$kq=$kq->result_array();
		$ten=$kq[0]['tendanhmuc'];
		return $ten;

	}
	function delTin($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tintuc');
	}
	function LoadTinFrontEnd($sotinmottrang)
	{	
		
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$dl=$this->db->get('danhmuctin',$sotinmottrang,0);
		$dl=$dl->result_array();
		return $dl;
	}
	function soTrang($sotinmottrang)
	{
		
		$this->db->select('*');
		$kq=$this->db->get('tintuc');
		$kq=$kq->result_array();
		$soluongtin=count($kq);
		$sotrang=ceil($soluongtin/$sotinmottrang);
		return $sotrang;
	}
	function loadTinTheoTrang($trang,$sotinmottrang)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$vitri=($trang - 1)*$sotinmottrang;
		$dl=$this->db->get('danhmuctin',$sotinmottrang,$vitri);
		$dl=$dl->result_array();
		return $dl;
	}
	function LoadTinTheoDM($sotinmottrang,$iddm)
	{	
		
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.iddanhmuc', $iddm);
		$dl=$this->db->get('danhmuctin');
		$dl=$dl->result_array();
		return $dl;
	}
	function getIdDanhMucById($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$kq=$this->db->get();
		$kq=$kq->result_array();
		$iddanhmuc=$kq[0]['iddanhmuc'];
		return $iddanhmuc;

	}
	function LoadTinLienQuan($sotinmottrang,$iddm,$idtin)
	{	
		
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.iddanhmuc', $iddm);
		$this->db->where('tintuc.id !=', $idtin);
		$dl=$this->db->get('danhmuctin');
		$dl=$dl->result_array();
		return $dl;
	}
}

/* End of file Tin_model.php */
/* Location: ./application/controllers/Tin_model.php */