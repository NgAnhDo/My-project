<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slides_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function laydulieu()
	{
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'slides_topbanner');
		$dl=$this->db->get('homepage');
		$dl=$dl->result_array();
		foreach ($dl as $value) 
		{
			$trunggian=$value['giatrithuoctinh'];
		}
		return $trunggian;
	}
	function updateSlides($dl)
	{
		$this->db->where('tenthuoctinh', 'slides_topbanner');
		$dl = [
		    'tenthuoctinh' => 'slides_topbanner',
		    'giatrithuoctinh'=>$dl
		];
		return $this->db->update('homepage', $dl);
	}

}

/* End of file slides_model.php */
/* Location: ./application/controllers/slides_model.php */