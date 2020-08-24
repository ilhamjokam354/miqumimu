<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('role_id') != "1") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login_admin');
        }
    }

    public function index(){
      $data["countGallery"] = $this->model_dashboard->getCountGallery();
      $data["countMakanan"] = $this->model_dashboard->getCountMakanan();
      $data["countMinuman"] = $this->model_dashboard->getCountMinuman();
      $data["countLainya"] = $this->model_dashboard->getCountLainya();
      
      $data["countSlider"] = $this->model_dashboard->getCountSlider();
      $data["countTestimoni"] = $this->model_dashboard->getCountTestimoni();
      $this->load->view('admin/template_admin/header');
      $this->load->view('admin/template_admin/sidebar');
      $this->load->view('admin/dashboard', $data);
      $this->load->view('admin/template_admin/footer');
    }
}
?>