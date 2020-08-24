<?php
class Data_makanan extends CI_Controller
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
        $data['makanan']= $this->model_makanan->tampilData()->result();
        $this->load->view("admin/template_admin/header");
        $this->load->view("admin/template_admin/sidebar");
        $this->load->view("admin/data_makanan", $data);
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
            $config ['upload_path'] = './uploads/produk/makanan';
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
        $this->model_makanan->tambahProduk($data, 'tbl_makanan');
        redirect('mmadmins/data_makanan/');
    }

    public function edit($id){
        $where = array('id_makanan' => $id);
        $data['makanan'] = $this->model_makanan->editProduk($where, 'tbl_makanan')->result();
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/edit_makanan', $data);
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
            $where = array('id_makanan' => $id);

            $this->model_makanan->updateData($where, $data, 'tbl_makanan');
            redirect('mmadmins/data_makanan');
        }else{
            $config ['upload_path'] = './uploads/produk/makanan';
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
        $where = array('id_makanan' => $id);

        $this->model_makanan->updateData($where, $data, 'tbl_makanan');
        redirect('mmadmins/data_makanan');
    }

    public function hapus($id){
        $where = array('id_makanan' => $id);
        $this->model_makanan->hapusData($where, 'tbl_makanan');
        // $query = $this->db->get_where("tbl_gallery", array("id_gallery" => $id))->row();
        
        // $path = "/uploads/gallery/".$query->gambar;
        // unlink($path);
        redirect('mmadmins/data_makanan/');
        // var_dump($path);
    }
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['makanan'] = $this->model_makanan->getKeyword($keyword);
        $this->load->view('admin/template_admin/header');
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/data_makanan', $data);
        $this->load->view('admin/template_admin/footer');

    }
}