<?php
class Data_gallery extends CI_Controller
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
    
    public function index()
    {
        $data['gallery']= $this->model_gallery->tampilData()->result();
        $this->load->view("admin/template_admin/header");
        $this->load->view("admin/template_admin/sidebar");
        $this->load->view("admin/data_gallery", $data);
        $this->load->view("admin/template_admin/footer");
    }

    public function tambahData(){
        $description = $this->input->post('description');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar == '') {
            echo "Tambah Data Gagal";
        }else{
            $config ['upload_path'] = './uploads/gallery';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload' , $config);
            if (!$this->upload->do_upload('gambar')) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Upload Gambar Gagal, Silahkan Cek Kembali
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array('description' => $description, 'gambar' => $gambar);
        $this->model_gallery->tambahGallery($data, 'tbl_gallery');
        redirect('mmadmins/data_gallery/');
    }

    public function edit($id){
        $where = array('id_gallery' => $id);
        $data['gallery'] = $this->model_gallery->editGallery($where, 'tbl_gallery')->result();
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/edit_gallery', $data);
        $this->load->view('admin/template_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $description = $this->input->post('description');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar == '') {
            $data = array('description' => $description);
            $where = array('id_gallery' => $id);

            $this->model_gallery->updateData($where, $data, 'tbl_gallery');
            redirect('mmadmins/data_gallery');
        }else{
            $config ['upload_path'] = './uploads/gallery';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload' , $config);
            if (!$this->upload->do_upload('gambar')) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Upload Gambar Gagal, Silahkan Cek Kembali
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array('description' => $description, 'gambar' => $gambar);
        $where = array('id_gallery' => $id);

        $this->model_gallery->updateData($where, $data, 'tbl_gallery');
        redirect('mmadmins/data_gallery');
    }

    public function hapus($id){
        $where = array('id_gallery' => $id);
        $this->model_gallery->hapusData($where, 'tbl_gallery');
        // $query = $this->db->get_where("tbl_gallery", array("id_gallery" => $id))->row();
        
        // $path = "/uploads/gallery/".$query->gambar;
        // unlink($path);
        redirect('mmadmins/data_gallery/');
        // var_dump($path);
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['gallery'] = $this->model_gallery->getKeyword($keyword);
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/data_gallery', $data);
        $this->load->view('admin/template_admin/footer');

    }
    
}