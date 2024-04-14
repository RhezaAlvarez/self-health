<?php 
	class User_model extends CI_Model{
		public function register($enc_password){

			$tanggal_lahir = $this->input->post('tanggal_lahir');

			$tanggal_lahir = explode("-", $tanggal_lahir);

			$birthDate[0] = $tanggal_lahir[1];
			$birthDate[1] = $tanggal_lahir[2];
			$birthDate[2] = $tanggal_lahir[0];

			$age = (date("md", date("U", mktime(0, 2, 1, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));

			// User data array
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'usia' => $age,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'diet' => "no"
			);

			return $this->db->insert('tb_akun', $data);
		}

		public function insertBMI(){

			$result = $this->db->get('tb_akun');

			$row = $result->last_row();

			$tb = $row->tinggi_badan / 100;

			// print_r($row);
			
			// Insert user
			$bmi = $row->berat_badan/ ($tb * 2);

			$data = array(
				'id_bmi_akun' => $row->id_akun,
				'bmi' => $bmi
			);

			return $this->db->insert('tb_sejarah_bmi', $data);
		}


		public function login($username, $password){
			// Pengecekan apakah username dan passwordnya sudah ada di database
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			// Mengambil data dari tabel user
			$result = $this->db->get('tb_akun');
				

			// jika user dan pass nya match dengan yg ditabel
			if($result->num_rows() == 1){
				return $result->row(0)->id_akun; // jika match, melemparkan nilai id nya
			}else{
				return false; // jika tidak
			}
		}

		// Check username udah ada belum
		public function check_username_exists($username){

			// Mengakses database, dan mencari data username yg sama
			$query = $this->db->get_where('tb_akun', array('username' => $username));

			// jika tidak ada
			if(empty($query->row_array())){
				return true; // melempar true

			// jika ada
			}else{
				// melempar false
				return false;
			}
		}

		public function get_akun($id_akun){

			// mengambil data di  tabel commakun ent sesuai id_akun
			$query = $this->db->get_where('tb_akun', array('id_akun' => $id_akun));

			// melemparkan isi
			return $query->row_array();
		}

		public function update_akun()
		{
			// menyalin ke variabel data
			$data = array(
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan')
			);

			// mencari database sesuai id
			$this->db->where('id_akun', $this->session->userdata('user_id'));

			// melemparkan data nya, di update
			return $this->db->update('tb_akun', $data);
		}

		public function update_akun_2()
		{
			$tanggal_lahir = $this->input->post('tanggal_lahir');

			$tanggal_lahir = explode("-", $tanggal_lahir);

			$birthDate[0] = $tanggal_lahir[1];
			$birthDate[1] = $tanggal_lahir[2];
			$birthDate[2] = $tanggal_lahir[0];

			$age = (date("md", date("U", mktime(0, 2, 1, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));

			// menyalin ke variabel data
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'usia' => $age
			);

			// mencari database sesuai id
			$this->db->where('id_akun', $this->session->userdata('user_id'));

			// melemparkan data nya, di update
			return $this->db->update('tb_akun', $data);
		}


		public function update_akun3()
		{
			// menyalin ke variabel data
			$data = array(
				'diet' => "yes"
			);

			// mencari database sesuai id
			$this->db->where('id_akun', $this->session->userdata('user_id'));

			// melemparkan data nya, di update
			return $this->db->update('tb_akun', $data);
		}

		public function update_akun3_unset()
		{
			// menyalin ke variabel data
			$data = array(
				'diet' => "no"
			);

			// mencari database sesuai id
			$this->db->where('id_akun', $this->session->userdata('user_id'));

			// melemparkan data nya, di update
			return $this->db->update('tb_akun', $data);
		}


		public function insert_diet()
		{

		// Rumus mencari berapa hari dia bisa nurunin berat badan sesuai targetnya dimana jika sehari bisa mengurangi 500 kalori maka seminggu bisa 1kg
		$deadline =	$this->input->post('target') * 7;

		$t = time();
		$curtime = (date("Y-m-d", $t));

		$date = $curtime;
		$date_plus = date('Y-m-d', strtotime($date . '+' .round($deadline).'days'));

		$data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));

		if($data['akun']['jenis_kelamin'] = "Perempuan"){
			$kalori_target = 1500 * $deadline;
		}else{
			$kalori_target = 2000 * $deadline;
		}

		// menyalin ke variabel data
		$data = array(
			'id_kes_akun' => $this->session->userdata('user_id'),
			'target' => $this->input->post('target'),
			'persentase_pencapaian' => 0,
			'deadline' => $date_plus,
			'kalori_target' => $kalori_target
		);

		// melemparkan data nya, di insert
		return $this->db->insert('tb_kesehatan', $data);
	}

	}