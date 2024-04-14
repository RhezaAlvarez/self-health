<?php
	class Pages extends CI_Controller{


		public function view($page = 'home'){
			// Menerima satu argumen bernama $page yang berisi nama halaman yg akan dimuat

			// Memeriksa apakah halaman yang diminta benar2 ada
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				// Jika tidak ada
				show_404();
			}

			// menyimpan isi halaman ke array data sbg judul
			$data['title'] = ucfirst($page);

			// Memuat view 
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}