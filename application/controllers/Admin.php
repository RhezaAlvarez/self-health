<?php 	

class Admin extends CI_Controller{

  public function index(){
    if (!$this->session->userdata('logged_in')) {
      $this->load->view('templates/header');
      $this->load->view('pages/warning');
      $this->load->view('templates/footer');
    } else {
      $this->load->view('templates/header_admin');
      $this->load->view('pages/admin');
      $this->load->view('templates/footer');
    }
  }

  public function insertFood()
  {
    $this->food_model->insert();


    redirect('admin');

  }
  
  public function insertSport()
  {
    $this->sport_model->insert();


    redirect('admin');

  }
}