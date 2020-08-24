<?php 
class Auth extends CI_Controller
{
    public function login_admin(){
        $this->form_validation->set_rules('username', 'Username', 'required', ['required'=> 'Username Wajib diIsi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required'=> 'Password Tidak Boleh Kosong!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template_admin/header');
            $this->load->view('admin/login');
            $this->load->view('admin/template_admin/footer');
        }else {
            $auth = $this->model_auth->cekLogin();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Username atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('auth/login_admin');
            }else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('mmadmins/dashboard_admin');
                        break;

                    
                    default:
                        # code...
                        break;
                }
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login_admin');
    }

    
}

?>