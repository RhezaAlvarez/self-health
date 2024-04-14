<?php
class Bmi_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function getBMI($id)
  {
    // Mengambil database data bmi
    $this->db->where('id_bmi_akun', $id);
    $query = $this->db->get('tb_sejarah_bmi');
    
    // melemparkan isinya
    return $query->last_row();
  }

  public function getBmiHistori()
  {

    $this->db->select('*');
    $this->db->from('tb_sejarah_bmi');
    $this->db->where('id_bmi_akun', $this->session->userdata('user_id'));
    $query = $this->db->get();

    // melemparkan isinya
    return $query->result_array();
  }
}