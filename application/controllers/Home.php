<?php

	class Home extends CI_Controller{
		public function index(){

			$data['magTaste'] = $this->food_model->getTaste_magnitude();
			$data['magCuisene'] = $this->food_model->getCuisene_magnitude();

			$favTaste = $data['magTaste']['taste'];
			$data['fav'] = $this->food_model->getFoodbyFav($favTaste);
			$data['kebutuhan'] = $this->count_remain_cal();
			
			// print_r($data['fav']);
			
			$data['magInten'] = $this->sport_model->getInten_magnitude();
			$data['magTools'] = $this->sport_model->getTools_magnitude();
			$favInten = $data['magInten']['intensitas'];
			$data['fav2'] = $this->sport_model->getSportbyFav($favInten);

			$data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));


			if(!$this->session->userdata('logged_in')){
				$this->load->view('templates/header');
				$this->load->view('pages/warning');
				$this->load->view('templates/footer');
			
			}else{
				$this->load->view('templates/header_user');
				$this->load->view('home/index', $data);
				$this->load->view('templates/footer');
			}

		}

	public function count_remain_cal()
	{
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

			$kebutuhan = 2000 - $cal_in + $cal_out;
			return $kebutuhan;
		} else {
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


			$kebutuhan = 2500 - $cal_in + $cal_out;
			return $kebutuhan;
		}
	}
  }
