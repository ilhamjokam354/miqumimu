<?php
class Data_lainya extends CI_Controller
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
        $data['lainya']= $this->model_lainya->tampilData()->result();
        $this->load->view("admin/template_admin/header");
        $this->load->view("admin/template_admin/sidebar");
        $this->load->view("admin/data_lainya", $data);
        $this->load->view("admin/template_admin/footer");
    }

    public function tambahData(){
        $judul_produk = $this->input->post('judul_produk');
        $pesan_order_wa = $this->input->post('pesan_order_wa');
        
        
        $rating = $this->input->post('rating');
        $harga_asli = $this->input->post('harga_asli');
        $harga_potong = $this->input->post('harga_potong');
        $gambar = $_FILES['gambar']['name'];
        $text_discount = ($harga_potong / 100)* $harga_asli ? ($harga_potong / 100)* $harga_asli : "0";

        if ($gambar == '') {
            echo "Tambah Data Gagal";
        }else{
            $config ['upload_path'] = './uploads/produk/lainya';
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

        $data = array('text_discount'=> $text_discount, 'judul_produk'=> $judul_produk, 'pesan_order_wa' => $pesan_order_wa,'rating' => $rating, 'harga_asli' => $harga_asli, 'harga_potong' => $harga_potong, 'gambar' => $gambar);
        $this->model_lainya->tambahProduk($data, 'tbl_lainya');
        redirect('mmadmins/data_lainya/');
    }

    public function edit($id){
        $where = array('id_lainya' => $id);
        $data['lainya'] = $this->model_lainya->editProduk($where, 'tbl_lainya')->result();
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/edit_lainya', $data);
        $this->load->view('admin/template_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $judul_produk = $this->input->post('judul_produk');
        $pesan_order_wa = $this->input->post('pesan_order_wa');
        
        $rating = $this->input->post('rating');
        $harga_asli = $this->input->post('harga_asli');
        $harga_potong = $this->input->post('harga_potong');
        $gambar = $_FILES['gambar']['name'];
        $text_discount = ($harga_potong / 100)* $harga_asli ? ($harga_potong / 100)* $harga_asli : false;

        if ($gambar == '') {
            $data = array('text_discount'=> $text_discount, 'judul_produk'=> $judul_produk, 'pesan_order_wa' => $pesan_order_wa,  'rating' => $rating, 'harga_asli' => $harga_asli, 'harga_potong' => $harga_potong);
            $where = array('id_lainya' => $id);

            $this->model_lainya->updateData($where, $data, 'tbl_lainya');
            redirect('mmadmins/data_lainya');
        }else{
            $config ['upload_path'] = './uploads/produk/lainya';
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
        $data = array('text_discount'=> $text_discount, 'judul_produk'=> $judul_produk, 'pesan_order_wa' => $pesan_order_wa, 'rating' => $rating, 'harga_asli' => $harga_asli, 'harga_potong' => $harga_potong, 'gambar' => $gambar);
        $where = array('id_lainya' => $id);

        $this->model_lainya->updateData($where, $data, 'tbl_lainya');
        redirect('mmadmins/data_lainya');
    }

    public function hapus($id){
        $where = array('id_lainya' => $id);
        $this->model_lainya->hapusData($where, 'tbl_lainya');
        // $query = $this->db->get_where("tbl_gallery", array("id_gallery" => $id))->row();
        
        // $path = "/uploads/gallery/".$query->gambar;
        // unlink($path);
        redirect('mmadmins/data_lainya/');
        // var_dump($path);
    }
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['lainya'] = $this->model_lainya->getKeyword($keyword);
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/data_lainya', $data);
        $this->load->view('admin/template_admin/footer');

    }
}