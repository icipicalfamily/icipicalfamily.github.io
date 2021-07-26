<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('MyModel');
    }

    public function index(){

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if($user) {
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        
                    ];
                    $this->session->set_userdata($data);

                    if($user['role_id'] == 1) {
                        redirect(base_url('admin'));
                    } else if($user['role_id'] == 2) {
                        redirect(base_url());
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username tidak terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url('login'));
            }
        }
        
    }

    public function register() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => 2
            ];
            $this->MyModel->addUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil, Silahkan Login<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id_user');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda telah Logout<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('login');
    }
        
}
        
    /* End of file  Auth.php */
        
                            