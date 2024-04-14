<?php
class Food_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function getFood()
  {
    // Mengambil database data makanan
    $query = $this->db->get('tb_data_makanan');

    // melemparkan isinya
    return $query->result_array();
  }

  public function insert()
  {

    // menyalin ke variabel data
    $data = array(
      'food_name' => $this->input->post('food_name'),
      'calories' => $this->input->post('calories'),
      'taste' => $this->input->post('taste'),
      'cuisene' => $this->input->post('cuisene')
    );

    // melemparkan data nya, di insert
    return $this->db->insert('tb_data_makanan', $data);
  }

  public function getFoodHistori()
  {

    $this->db->select('*');
    $this->db->from('tb_sejarah_makanan');
    $this->db->join('tb_data_makanan', 'tb_data_makanan.id_dm = tb_sejarah_makanan.id_sm_makanan');
    $this->db->order_by('tanggal_sm', 'DESC');
    $this->db->where('id_sm_akun', $this->session->userdata('user_id'));
    $query = $this->db->get();

    // melemparkan isinya
    return $query->result_array();
  }

  public function getFoodHistoriASC()
  {

    $this->db->select('*');
    $this->db->from('tb_sejarah_makanan');
    $this->db->join('tb_data_makanan', 'tb_data_makanan.id_dm = tb_sejarah_makanan.id_sm_makanan');
    $this->db->where('id_sm_akun', $this->session->userdata('user_id'));
    $query = $this->db->get();

    // melemparkan isinya
    return $query->result_array();
  }

  public function insert_sejarah_makanan(){
    
    // Mengambil database data makanan sesuai inputan nama makanan
    // print_r($this->input->post('food'));

    $query = $this->db->get_where('tb_data_makanan', array('food_name' => $this->input->post('food')));

    // print_r($query->row());
    
    $id = $query->row()->id_dm;
    $total_calories = $this->input->post('portion') * $query->row()->calories;
    
    // disalin ke variabel data
    $data = array(
      'id_sm_akun' => $this->session->userdata('user_id'),
      'id_sm_makanan' => $id,
      'jumlah' => $this->input->post('portion'),
      'kalori_total' => $total_calories
    );

    // insert data ke tabel sejarah makanan
    return $this->db->insert('tb_sejarah_makanan', $data);
  }

  public function getTaste_magnitude()
  {

    $this->db->group_by('taste');
    $this->db->select('taste');
    $this->db->select("count(*) as total");
    $this->db->from('tb_sejarah_makanan');
    $this->db->join('tb_data_makanan', 'tb_data_makanan.id_dm = tb_sejarah_makanan.id_sm_makanan');
    $this->db->where('id_sm_akun', $this->session->userdata('user_id'));
    $this->db->order_by('total', 'DESC');
    $query = $this->db->get();

    // melemparkan isinya
    return $query->first_row('array');
  }

  public function getCuisene_magnitude()
  {

    $this->db->group_by('cuisene');
    $this->db->select('cuisene');
    $this->db->select("count(*) as total");
    $this->db->from('tb_sejarah_makanan');
    $this->db->join('tb_data_makanan', 'tb_data_makanan.id_dm = tb_sejarah_makanan.id_sm_makanan');
    $this->db->where('id_sm_akun', $this->session->userdata('user_id'));
    $this->db->order_by('total', 'DESC');
    $query = $this->db->get();

    // melemparkan isinya
    return $query->first_row('array');
  }

  public function getFoodbyFav($fav)
  {
    // Mengambil database data makanan
    $this->db->select('food_name');
    $this->db->select('calories');
    $this->db->select('cuisene');
    $this->db->where('taste', $fav);
    $query = $this->db->get('tb_data_makanan');
    // melemparkan isinya
    return $query->result_array();
  }
}
