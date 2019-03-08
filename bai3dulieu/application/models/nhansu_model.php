<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertDataToMySql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$dulieu_nhanvien=array("ten"=>$ten,"tuoi"=>$tuoi,"sdt"=>$sdt,"anhavatar"=>$anhavatar,"linkfb"=>$linkfb,"sodonhang"=>$sodonhang);
		$this->db->insert('nhan_vien', $dulieu_nhanvien);
		return $this->db->insert_id();
	}
	function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$dulieu=$this->db->get('nhan_vien');
		$dulieu=$dulieu->result_array();
		return $dulieu;
	}
	function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu=$this->db->get('nhan_vien');
		$dulieu=$dulieu->result_array();
		return $dulieu;
	}
	function updateDataToMySql($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		//đóng gói các biến thành mảng
		$data=array("id"=>$id,"ten"=>$ten,"tuoi"=>$tuoi,"sdt"=>$sdt,"anhavatar"=>$anhavatar,"linkfb"=>$linkfb,"sodonhang"=>$sodonhang);
		$this->db->where('id', $id);
		
		return $this->db->update('nhan_vien', $data);
	}
	function delDataById($id)
	{
		
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');

	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */