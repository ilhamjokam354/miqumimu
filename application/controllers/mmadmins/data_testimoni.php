<?php
class Data_testimoni extends CI_Controller
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
        $data['testimoni']= $this->model_testimoni->tampilData()->result();
        $this->load->view("admin/template_admin/header");
        $this->load->view("admin/template_admin/sidebar");
        $this->load->view("admin/data_testimoni", $data);
        $this->load->view("admin/template_admin/footer");
    }

    public function tambahData(){
        
        $nama_testimoni = $this->input->post('nama_testimoni');
        $kedudukan_testimoni = $this->input->post('kedudukan_testimoni');
        $link_fb = $this->input->post('link_fb');
        $link_ig = $this->input->post('link_ig');
        $pesan_testimoni = $this->input->post('pesan_testimoni');
        $gambar_testimoni = $_FILES['gambar_testimoni']['name'];

        if ($gambar_testimoni = '') {
            echo "Tambah Data Gagal";
        }else{
            $config ['upload_path'] = './uploads/testimoni';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload' , $config);
            if (!$this->upload->do_upload('gambar_testimoni')) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Upload Gambar Gagal, Silahkan Cek Kembali
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }else {
                $gambar_testimoni = $this->upload->data('file_name');
            }
        }

        $data = array('gambar_testimoni'=> $gambar_testimoni, 'nama_testimoni' => $nama_testimoni, 'kedudukan_testimoni' => $kedudukan_testimoni, 'link_fb' => $link_fb, 'link_ig' => $link_ig, "pesan_testimoni"=> $pesan_testimoni);
        $this->model_testimoni->tambahTestimoni($data, 'tbl_testimoni');
        redirect('mmadmins/data_testimoni/');
    }

    public function edit($id){
        $where = array('id_testimoni' => $id);
        $data['testimoni'] = $this->model_testimoni->editTestimoni($where, 'tbl_testimoni')->result();
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/edit_testimoni', $data);
        $this->load->view('admin/template_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $pesan_testimoni = $this->input->post('pesan_testimoni');
        $nama_testimoni = $this->input->post('nama_testimoni');
        $kedudukan_testimoni = $this->input->post('kedudukan_testimoni');
        $link_fb = $this->input->post('link_fb');
        $link_ig = $this->input->post('link_ig');
        $gambar_testimoni = $_FILES['gambar_testimoni']['name'];


        if ($gambar_testimoni == '') {
            $data = array('nama_testimoni' => $nama_testimoni, 'kedudukan_testimoni' => $kedudukan_testimoni, 'link_fb' => $link_fb, 'link_ig' => $link_ig, 'pesan_testimoni' => $pesan_testimoni);
            $where = array('id_testimoni' => $id);

            $this->model_testimoni->updateData($where, $data, 'tbl_testimoni');
            redirect('mmadmins/data_testimoni');
        }else{
            $config ['upload_path'] = './uploads/testimoni';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload' , $config);
            if (!$this->upload->do_upload('gambar_testimoni')) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Upload Gambar Gagal, Silahkan Cek Kembali
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }else {
                $gambar_testimoni = $this->upload->data('file_name');
            }
        }
        $data = array('gambar_testimoni'=> $gambar_testimoni, 'nama_testimoni' => $nama_testimoni, 'kedudukan_testimoni' => $kedudukan_testimoni, 'link_fb' => $link_fb, 'link_ig' => $link_ig, 'pesan_testimoni' => $pesan_testimoni);
        $where = array('id_testimoni' => $id);

        $this->model_testimoni->updateData($where, $data, 'tbl_testimoni');
        redirect('mmadmins/data_testimoni');
    }

    public function hapus($id){
        $where = array('id_testimoni' => $id);
        $this->model_testimoni->hapusData($where, 'tbl_testimoni');
        // $query = $this->db->get_where("tbl_gallery", array("id_gallery" => $id))->row();
        
        // $path = "/uploads/gallery/".$query->gambar;
        // unlink($path);
        redirect('mmadmins/data_testimoni/');
        // var_dump($path);
    }
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['testimoni'] = $this->model_testimoni->getKeyword($keyword);
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/data_testimoni', $data);
        $this->load->view('admin/template_admin/footer');

    }
}