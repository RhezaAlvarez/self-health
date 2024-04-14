<?php

class Dashboard extends CI_Controller
{
  public function index()
  {
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));
    $data['food'] = $this->food_model->getFood();
    $data['bmi'] = $this->bmi_model->getBMI($this->session->userdata('user_id'));
    $data['histori_m'] = $this->food_model->getFoodHistoriASC();
    $data['histori_o'] = $this->sport_model->getSportHistoriASC();

    $data['kebutuhan'] = $this->count_remain_cal();

    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_user');
      $this->load->view('dashboard/index', $data);
      $this->load->view('templates/footer');
    }
  }

  public function count_remain_cal(){
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));
    $data['histori_m'] = $this->food_model->getFoodHistoriASC();
    $data['histori_o'] = $this->sport_model->getSportHistoriASC();


    if ($data['akun']['jenis_kelamin'] == "Perempuan") {
        $cal_in = 0;
        $cal_out = 0;
        $t = time();
        $curtime = (date("Y-m-d", $t));

        foreach ($data['histori_m'] as $rs) {
          $date = $rs['tanggal_sm'];
          $pieces = explode(" ", $date);

          if ($curtime == $pieces[0]) {
            $cal_in = $cal_in + $rs['kalori_total'];
          }
        }

        foreach ($data['histori_o'] as $rs) {
          $date = $rs['tanggal_so'];
          $pieces = explode(" ", $date);

          if ($curtime == $pieces[0]) {
            $cal_out = $cal_out + $rs['pembakaran_kalori'];
          }
        }

        if ($data['akun']['diet'] == "no") {
          $need_cal = 2000;
        } else {
          $need_cal = 1500;
        }
        
      }else{
        $cal_in = 0;
        $cal_out = 0;
        $t = time();
        $curtime = (date("Y-m-d", $t));

        foreach ($data['histori_m'] as $rs) {
          $date = $rs['tanggal_sm'];
          $pieces = explode(" ", $date);

          if ($curtime == $pieces[0]) {
            $cal_in = $cal_in + $rs['kalori_total'];
          }
        }

        foreach ($data['histori_o'] as $rs) {
          $date = $rs['tanggal_so'];
          $pieces = explode(" ", $date);

          if ($curtime == $pieces[0]) {
            $cal_out = $cal_out + $rs['pembakaran_kalori'];
          }
        }

        if ($data['akun']['diet'] == "no") {
          $need_cal = 2500;
        } else {
          $need_cal = 2000;
        }

      }

      $kebutuhan = $need_cal - $cal_in + $cal_out;
      return $kebutuhan;
}
 
  public function update()
  {
    $data['histori_bmi'] = $this->bmi_model->getBmiHistori();
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));

    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_user');
      $this->load->view('dashboard/update', $data);
      $this->load->view('templates/footer');
    }
  }

  public function histori($pilihan = ""){

    $data['histori_m'] = $this->food_model->getFoodHistori();
    $data['histori_o'] = $this->sport_model->getSportHistori();

    $data['pilihan'] = $pilihan;

    // print_r($data['histori']);
    // check login or not
    if(!$this->session->userdata('logged_in')) {
      redirect('users/login');
    }
    else{
      $this->load->view('templates/header_user');
      $this->load->view('dashboard/histori', $data);
      $this->load->view('templates/footer');
    }
  }

  public function create_food()
  {
    // check login or not
    if (!$this->session->userdata('logged_in')) {
      redirect('users/login');
    }
    
    else{  
      $this->food_model->insert_sejarah_makanan();

      // set message
      $this->session->set_flashdata('data_inserted', 'Your data has been created');

      redirect('dashboard');
      }
    
    }

  public function create_sport()
  {
    // check login or not
    if (!$this->session->userdata('logged_in')) {
      redirect('users/login');
    }
    
    else{  
      $this->sport_model->insert_sejarah_olahraga();

      // set message
      $this->session->set_flashdata('data_inserted', 'Your data has been created');

      redirect('dashboard');
      }
    
    }

  public function diet()
  {
    $data['histori_bmi'] = $this->bmi_model->getBmiHistori();
    $data['kesehatan'] = $this->kesehatan_model->getKesehatan($this->session->userdata('user_id'));
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));

    $data['histori_m'] = $this->food_model->getFoodHistori();
    $data['histori_o'] = $this->sport_model->getSportHistori();

    $t = time();
    $curtime = (date("Y-m-d", $t));
    $date_now = $curtime;

    $date_diet = $data['kesehatan']['tanggal_submit'];
    $onlydate_diet = explode(" ", $date_diet);
    
    $jml_konsumsi = 0;
    $jml_terbakar = 0;

    foreach ($data['histori_m'] as $hm) {
      $date_hm = $hm['tanggal_sm'];
      $onlydate_hm = explode(" ", $date_hm);

      if($onlydate_hm[0] >= $onlydate_diet[0]){
        $jml_konsumsi = $jml_konsumsi + $hm['kalori_total'];
      }
    }

    foreach ($data['histori_o'] as $ho) {
      $date_ho = $ho['tanggal_so'];
      $onlydate_ho = explode(" ", $date_ho);

      if($onlydate_ho[0] >= $onlydate_diet[0]){
        $jml_terbakar = $jml_terbakar + $ho['pembakaran_kalori'];
      }
    }

    $total = $jml_konsumsi - $jml_terbakar;

    $perhitungan_persentase = $total / $data['kesehatan']['kalori_target'] * 100;
    
    if($perhitungan_persentase >= 100){
      $perhitungan_persentase = ($data['kesehatan']['kalori_target'] - $total) * 100;
    }

    $persentase = round($perhitungan_persentase, 2);

    $this->kesehatan_model->update_persentase($persentase, $data['kesehatan']['id_kesehatan']);
    // echo $total;

    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_user');
      $this->load->view('dashboard/diet', $data);
      $this->load->view('templates/footer');
    }
  }



}
