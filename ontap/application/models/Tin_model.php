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

}

/* End of file Tin_model.php */
/* Location: ./application/controllers/Tin_model.php */