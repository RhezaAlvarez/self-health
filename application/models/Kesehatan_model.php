<?php
class Kesehatan_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function getKesehatan($id)
  {
    // Mengambil database data kesehatan
    $this->db->where('id_kes_akun', $id);
    $query = $this->db->get('tb_kesehatan');

    // melemparkan isinya
    return $query->last_row('array');
  }

  public function update_persentase($persentase, $id)
  {

    // menyalin ke variabel data
    $data = array(
      'persentase_pencapaian' => floatval(str_replace(',', '.', $persentase))
    );

    // mencari database sesuai id
    $this->db->where('id_kesehatan', $id);

    // melemparkan data nya, di update
    return $this->db->update('tb_kesehatan', $data);
  }
}
