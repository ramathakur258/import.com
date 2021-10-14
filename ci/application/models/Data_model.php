<?php 

class Data_model extends CI_Model {


	function __construct() {
        parent::__construct();
        $this->load->database();
    }

public function Getopen()
{   

    $this->db->select('result_id,market_id,open_result_digit,open_digit_sum,date');
   
    $this->db->from("result");
     $this->db->where("market_id",17);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
    }else{
        return false;
    }
       
}

public function Getclose()
{   

    $this->db->select('result_id,market_id,close_result_digit,close_digit_sum,date');
    $this->db->from("result");
     $this->db->where("market_id",18);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
    }else{
        return false;
    }
       
}
function select()
	{
		$this->db->order_by('result_id', 'DESC');
		$query = $this->db->get('result');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('result', $data);
	}

// function get_addressbook() {     
//     $query = $this->db->get('result');
//     if ($query->num_rows() > 0) {
//         return $query->result_array();
//     } else {
//         return FALSE;
//     }
// }

// function insert_csv($data) {
//     $this->db->insert('result', $data);
// }

}

?>