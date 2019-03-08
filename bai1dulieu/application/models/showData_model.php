<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getDatabase()
	{
		$this->db->select('*');//lay het du lieu
		$ketqua=$this->db->get('so_sim');//lay tu bang ten so sim
		echo '<pre>';
		var_dump($ketqua);//in ra ket qua xem thu

	}
}

/* End of file showData_model.php */
/* Location: ./application/models/showData_model.php */