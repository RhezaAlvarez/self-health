<?php 

	class Users extends CI_Controller{
		// Register
		public function register(){
			
			// Mengisi array data title dengan tulisan Sign Up
			$data['title'] = 'SIGN UP';

			// form validation register
			$this->form_validation->set_rules('fullname', 'Fullname', 'required');
			// mengecek apakah usernamenya sudah ada
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		
			$this->form_validation->set_rules('password', 'Password', 'required');
			// mengecek apakah passwordnya match
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
			$this->form_validation->set_rules('tinggi_badan', 'Tinggi badan', 'required');
			$this->form_validation->set_rules('berat_badan', 'Berat badan', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			// Form validation awalnya otomatis false
			if($this->form_validation->run() === FALSE){

				// Memanggil view
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');

			}else{
				// encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				$this->user_model->insertBMI();

				// set message
				$this->session->set_flashdata('user_registered', 'You are now registed and can log in');

				// Dialihkan ke controller users, function posts
				redirect('users/login');
			}
		}

		// Log in users
		public function login(){

			// Mengisi array data title dengan tulisan Sign In
			$data['title'] = 'SIGN IN';

			// form validation, username dan password harus terisi
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			// Form validation awalnya otomatis false
			if($this->form_validation->run() === FALSE){
				// Memanggil view
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');

			// Jika terisi, maka TRUE
			}else{
				
				// Mengambil data username
				$username = $this->input->post('username');

				// Mengambil data username dan di enkripsi
				$password = md5($this->input->post('password'));

				// Memanggil model (user_model), masuk ke function login dengan membawa parameter username, password
				// Return value dari model
				$user_id = $this->user_model->login($username, $password);

				// jika ada user_id nya
				if($user_id){
					// create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					// Session terset
					$this->session->set_userdata($user_data);

					// set pesan
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					if($username == "admin"){
						redirect('admin');
					}else{
						redirect('home');
					}

				}else{
					// // set pesan
					// echo "gagal";
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// set message
				$this->session->set_flashdata('user_loggedout', 'You are now logged out');

				// dialihkan ke controller users, fungsi login	
				redirect('users/login');
		}

		// Pengecekan username udah ada / belum
		public function check_username_exists($username){

			// Set pesan
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

			// Memanggil model (user_model) dengan fungsi check_username_exists yg melempar data username
			if($this->user_model->check_username_exists($username)){
				return true; // melempar true
			}else{
				return false; // melempar false
			}
		}

		public function update()
		{
			$this->user_model->update_akun();

			$this->user_model->insertBMI();

			redirect('dashboard/update');

		}

		public function insertDiet()
		{
			$this->user_model->update_akun3();
			$this->user_model->insert_diet();

			// $this->user_model->insertBMI();

			redirect('dashboard/diet');

		}

		public function unsetDiet()
		{
			$this->user_model->update_akun3_unset();

			redirect('dashboard/diet');

		}

		public function listUsers(){

		$data = $this->data;

		$data['users'] = $this->mUser->getUser();
		$data['pilihan'] = "list";


			// Memuat tampilan
		$this->load->view('templates/header', $data);
		$this->load->view('users/listUser', $data);
		$this->load->view('templates/footer');
	}
	}