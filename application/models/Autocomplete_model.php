<?php
class Autocomplete_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->like('food_name', $query);
  $query = $this->db->get('tb_data_makanan');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'name'  => $row["food_name"],
    );
   }
   echo json_encode($output);
  }
 }

 function fetch_data2($query)
 {
  $this->db->like('sport', $query);
  $query = $this->db->get('tb_data_olahraga');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'name'  => $row["sport"],
    );
   }
   echo json_encode($output);
  }
 }
}
