<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xuLy_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	
	function getData()
	{
		$this->db->select('*');
		//$this->db->where('tenthuoctinh', 'topbanner');
		$dl=$this->db->get('on_json');
		$dl=$dl->result_array();
		foreach ($dl as $value) 
		{
			$temp=$value['giatrithuoctinh'];
		}
		return $temp;
	}
	function updateData($dl)
	{
		
		
		//$this->db->where('tenthuoctinh', 'topbanner');
		$temp=array(
			'tenthuoctinh'=>'topbanner',
			'giatrithuoctinh'=>$dl
			);
		return $this->db->update('on_json', $temp);
	}
	// function delData($key)
	// {
	// 	$this->db->where('giatrithuoctinh', "");
	// 	$temp=array(
	// 		'tenthuoctinh'=>'topbanner',
	// 		'giatrithuoctinh'=>$key
	// 		);
	// 	$this->db->where('giatrithuoctinh', $key);
	// 	return $this->db->delete('on_json');
	// }

}

/* End of file xuLy_model.php */
/* Location: ./application/controllers/xuLy_model.php */