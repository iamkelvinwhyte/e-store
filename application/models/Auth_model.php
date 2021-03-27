<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {



    /*
     * Fetch user data
     */


public function QueryRawUser_(){
$query =$this->db->query('SELECT * FROM personal_info ');
return $query->result_array();

}

public function UpdateLog_($data){
$this->db->replace('login_session',$data);
return TRUE;
}

//Generrate unique code
public function random_code($maxlength)
{
$bytes = random_bytes($maxlength);
return (bin2hex($bytes));

}


//Single Display All
public function single_query($db,$data,$order_id){
$this->db->select("*");
$this->db->from($db);
$this->db->where($data);
$this->db->order_by($order_id, "desc");
$query=$this->db->get();
return $query;
}

public function login_auth($db,$email){
$this->db->select('*');
$this->db->from($db);
$this->db->where("(email = '$email' OR phone = '$email')");
$this->db->where('active', 1);
$this->db->limit(1);
$this->db->join('in_store', 'personal_info.store_vid=in_store.store_vid','left');
$query = $this->db->get();
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}


public function user_login_auth($db,$email){
$this->db->select('*');
$this->db->from($db);
$this->db->where("(email = '$email' OR phone = '$email')");
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}



}
