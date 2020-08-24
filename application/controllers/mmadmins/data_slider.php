<?php
class Data_slider extends CI_Controller
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
        $data['slider']= $this->model_slider->tampilData()->result();
        $this->load->view("admin/template_admin/header");
        $this->load->view("admin/template_admin/sidebar");
        $this->load->view("admin/data_slider", $data);
        $this->load->view("admin/template_admin/footer");
    }

    public function tambahData(){
        $gambar = $_FILES['gambar']['name'];
        $tdiscount1 = $this->input->post('tdiscount1');
        $tdiscount2 = $this->input->post('tdiscount2');
        $judul = $this->input->post('judul');
        $description = $this->input->post('description');

        if ($gambar = '') {
            echo "Tambah Data Gagal";
        }else{
            $config ['upload_path'] = './uploads/slider';
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

        $data = array('gambar_slider'=> $gambar, 'text_discount_1'=> $tdiscount1, 'text_discount_2' => $tdiscount2, 'judul' => $judul, 'description' => $description);
        $this->model_slider->tambahSlider($data, 'tbl_slider');
        redirect('mmadmins/data_slider/');
    }

    public function edit($id){
        $where = array('id_slider' => $id);
        $data['slider'] = $this->model_slider->editSlider($where, 'tbl_slider')->result();
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/edit_slider', $data);
        $this->load->view('admin/template_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $gambar = $_FILES['gambar']['name'];
        $tdiscount1 = $this->input->post('tdiscount1');
        $tdiscount2 = $this->input->post('tdiscount2');
        $judul = $this->input->post('judul');
        $description = $this->input->post('description');

        if ($gambar == '') {
            $data = array('text_discount_1'=> $tdiscount1, 'text_discount_2' => $tdiscount2, 'judul' => $judul, 'description' => $description);
            $where = array('id_slider' => $id);

            $this->model_slider->updateData($where, $data, 'tbl_slider');
            redirect('mmadmins/data_slider');
        }else{
            $config ['upload_path'] = './uploads/slider';
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
        $data = array('gambar_slider'=> $gambar, 'text_discount_1'=> $tdiscount1, 'text_discount_2' => $tdiscount2, 'judul' => $judul, 'description' => $description);
        $where = array('id_slider' => $id);

        $this->model_slider->updateData($where, $data, 'tbl_slider');
        redirect('mmadmins/data_slider');
    }

    public function hapus($id){
        $where = array('id_slider' => $id);
        $this->model_slider->hapusData($where, 'tbl_slider');
        // $query = $this->db->get_where("tbl_gallery", array("id_gallery" => $id))->row();
        
        // $path = "/uploads/gallery/".$query->gambar;
        // unlink($path);
        redirect('mmadmins/data_slider/');
        // var_dump($path);
    }
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['slider'] = $this->model_slider->getKeyword($keyword);
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/data_slider', $data);
        $this->load->view('admin/template_admin/footer');

    }
}