<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	function insertData($ten,$dulieu)
	{
		$mangdl=array('ten'=>$ten,'dulieu'=>$dulieu);
		$this->db->insert('luu_json', $mangdl);
		return $this->db->insert_id();
	}
	function showData()
	{
		$this->db->select('*');
		$this->db->where('ten', 'contact');
		$dulieu=$this->db->get('luu_json');
		$dulieu=$dulieu->result_array();
		foreach ($dulieu as $value) {
			$kq=$value['dulieu'];
			
		}
		return $kq;

	}

	function updateData($dulieu)
	{
		$this->db->where('ten', 'contact');
		$dulieu = array(
			'ten'=>'contact',
			'dulieu'=>$dulieu
		);
		return $this->db->update('luu_json', $dulieu);
	}
}

/* End of file json_model.php */
/* Location: ./application/controllers/json_model.php */