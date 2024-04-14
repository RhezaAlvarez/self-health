<?php

class Profile extends CI_Controller
{
  public function index()
  {

    // array data title diisi 
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));

    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_user');
      $this->load->view('profile/index', $data);
      $this->load->view('templates/footer');
    }
  }

  public function edit()
  {

    // array data title diisi 
    $data['akun'] = $this->user_model->get_akun($this->session->userdata('user_id'));

    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_user');
      $this->load->view('profile/edit', $data);
      $this->load->view('templates/footer');
    }
  }

  public function update()
  {
    $this->user_model->update_akun_2();

    redirect('profile');
  }
}
