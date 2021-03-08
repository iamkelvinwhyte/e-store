<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_model extends CI_Model {

public function insertData_($db,$data){
$query=$this->db->insert($db, $data);
return $query;

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

//Single Display asc all
public function single_query_asc($db,$data,$order_id){
$this->db->select("*");
$this->db->from($db);
$this->db->where($data);
$this->db->order_by($order_id, "asc");
$query=$this->db->get();
return $query;
}



//join display
public function join_query($db1,$db2,$data,$id,$action,$join_type){
$this->db->select("*");
$this->db->from($db1);
$this->db->where($data);
$this->db->order_by($id, "desc");
$this->db->join($db2, $action,$join_type);
$query=$this->db->get();
return $query;

}


//if data exist
public function is_exist($db,$data){
$this->db->select('*');
$this->db->from($db);
$this->db->where($data);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}



//Display All
public function DisplayAl_Were($db,$data,$order_id){
$this->db->select("*");
$this->db->from($db);
$this->db->where_in($data);
$this->db->order_by($order_id, "desc");
$query=$this->db->get();
return $query->result_array();
}

// Update Date
function update_Data($id,$data,$db){
$this->db->where($id);
$this->db->update($db, $data);
return TRUE;
}

//Remove Media
function Del_Data_($db,$id){
$this->db->where( $id);
$a=$this->db->delete($db);
if(isset($a)){return TRUE;}else{return FALSE;}

}


//Display JOIN
public function DisplayJoin_($db1,$db2,$data,$id,$action,$join_type){
$this->db->select("*");
$this->db->from($db1);
$this->db->where($data);
$this->db->order_by($id, "desc");
$this->db->join($db2, $action,$join_type);
$query=$this->db->get();
return $query->result_array();

}
//Display JOIN
public function Display2Join_($db1,$db2,$db3,$data,$id,$action,$action3,$join_type,$join_type3){
$this->db->select("*");
$this->db->from($db1);
$this->db->where($data);
$this->db->order_by($id, "desc");
$this->db->join($db2, $action,$join_type);
$this->db->join($db3, $action3,$join_type3);
$query=$this->db->get();
return $query->result_array();

}
//Display JOIN3
public function MutiDisplayJoin_($db1,$db2,$db3,$db4,$data,$id,$action,$action3,$action4,$join_type,$join_type3,$join_type4){
$this->db->select("*");
$this->db->from($db1);
$this->db->where($data);
$this->db->order_by($id, "desc");
$this->db->join($db2, $action,$join_type);
$this->db->join($db3, $action3,$join_type3);
$this->db->join($db4, $action4,$join_type4);
$query=$this->db->get();
return $query->result_array();

}


//Display Day All
public function DisplayAll_chart($db,$data,$order_id,$days){
 $pmy = $days;
$this->db->select('DATE_FORMAT(date_log, "%b %d") AS date ,COUNT(status) AS status, SUM(amount) AS amount');
$this->db->from($db);
$this->db->where($data);
//$this->db->where('DAY(date_log)',$pmy);
$this->db->where('date_log BETWEEN DATE_SUB(NOW(), INTERVAL '.$pmy.' DAY) AND NOW()');
$this->db->order_by($order_id, "Asc");
 $this->db->group_by('DAY(date_log)');
$query=$this->db->get();
return $query->result_array();
}

//Display  Month All
public function MonthDisplayAll_($db,$data,$order_id){
$this->db->select('DATE_FORMAT(date_log, "%M") AS date ,COUNT(status) AS status , SUM(amount) AS amount');
$this->db->from($db);
$this->db->where($data);
$this->db->order_by($order_id, "Asc");
$this->db->group_by('MONTH(date_log)');
$query=$this->db->get();

return $query->result_array();
}


}


?>
