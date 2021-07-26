<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('MyModel');
        $usi = $this->MyModel->getUserByID($this->session->userdata('id_user'));

        if(!$this->session->userdata('id_user') || $usi['role_id'] != 1) { 
            redirect(base_url('login'));            
        }

    }

    public function index(){
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['jml_promo'] = $this->db->get('promo')->num_rows();
        $data['jml_produk'] = $this->db->get('produk')->num_rows();
        $data['jml_transaksi'] = $this->db->get('invoices')->num_rows();
        $data['jml_user'] = $this->db->get('user')->num_rows();
        $this->load->view('layout/admin-header', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('layout/admin-footer');
    }

    // Promo
    public function promo() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        if($this->input->post('search')) {
            $data['promo'] = $this->MyModel->getPromoSearch($this->input->post('search'));
        } else {
            $data['promo'] = $this->MyModel->getPromo();
        }
        $this->load->view('layout/admin-header', $data);
        $this->load->view('admin/promo', $data);
        $this->load->view('layout/admin-footer');
    }

    public function addPromo() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $this->form_validation->set_rules('nama_promo', 'Nama Promo', 'required|trim');

        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/promo-add', $data);
            $this->load->view('layout/admin-footer');
        } else {
			$token = $this->generateRandomString();
            $config = [
                'file_name' => date('d-m-Y').'-'.$token,
                'upload_path' => './asset/img/promo/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload',$config);

            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama_promo' => $this->input->post('nama_promo'),
                    'gambar' => $file['file_name'],
                    'waktu' => date('Y-m-d H:i:s')
                ];
                $this->MyModel->addPromo($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/promo');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/promo/add');
            }
        }
        

    }

    public function delPromo($id) {
        $this->_deletePromoImg($id);
        $this->MyModel->delPromo($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        redirect('admin/promo');
    }

    public function editPromo($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['promo'] = $this->MyModel->getPromoByID($id);
        $this->form_validation->set_rules('nama_promo', 'Nama Promo', 'required|trim');

        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/promo-edit', $data);
            $this->load->view('layout/admin-footer');
        } else {
            if(empty($_FILES['gambar']['name'])) {
                $data = [
                    'nama_promo' => $this->input->post('nama_promo')
                    
                ];
                $this->MyModel->editPromo($id,$data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/promo');
            } else {
                $this->_deletePromoImg($id);
				$token = $this->generateRandomString();
                $config = [
                    'file_name' => date('d-m-Y').'-'.$token,
                    'upload_path' => './asset/img/promo/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size' => 2048,
                ];
    
                $this->load->library('upload',$config);
    
                if($this->upload->do_upload('gambar')) {
                    $file = $this->upload->data();
                    $data = [
                        'nama_promo' => $this->input->post('nama_promo'),
                        'gambar' => $file['file_name'],
                        
                    ];
                    $this->MyModel->editPromo($id,$data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/promo');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/promo/edit/'.$id);
                }
            }
        }
    }

    // Produk
    public function produk() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        if($this->input->post('search')) {
            $data['produk'] = $this->MyModel->getProdukSearch($this->input->post('search'));
        } else {

            $data['produk'] = $this->MyModel->getProduk();
        }
        $this->load->view('layout/admin-header', $data);
        $this->load->view('admin/produk', $data);
        $this->load->view('layout/admin-footer');
    }

    public function addProduk() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->MyModel->getKategori();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/produk-add', $data);
            $this->load->view('layout/admin-footer');
        } else {
			$token = $this->generateRandomString();
            $config = [
                'file_name' => date('d-m-Y').'-'.$token,
                'upload_path' => './asset/img/produk/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload',$config);

            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'gambar' => $file['file_name'],
                    'deskripsi' => $this->input->post('deskripsi'),
                    'waktu' => date('Y-m-d H:i:s')
                ];
                $this->MyModel->addProduk($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/produk/add');
            }
        }
        

    }

    public function delProduk($id) {
        $this->_deleteProdukImg($id);
        $this->MyModel->delProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        redirect('admin/produk');
    }

    public function editProduk($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['produk'] = $this->MyModel->getProdukByID($id);
        $data['kategori'] = $this->MyModel->getKategori();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/produk-edit', $data);
            $this->load->view('layout/admin-footer');
        } else {
            if(empty($_FILES['gambar']['name'])) {
                $data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'waktu' => date('Y-m-d H:i:s')
                ];
                $this->MyModel->editProduk($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/produk');
            } else {
                $this->_deleteProdukImg($id);
				$token = $this->generateRandomString();
                $config = [
                    'file_name' => date('d-m-Y').'-'.$token,
                    'upload_path' => './asset/img/produk/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size' => 2048,
                ];
    
                $this->load->library('upload',$config);
    
                if($this->upload->do_upload('gambar')) {
                    $file = $this->upload->data();
                    $data = [
                        'nama_produk' => $this->input->post('nama_produk'),
                        'kategori' => $this->input->post('kategori'),
                        'harga' => $this->input->post('harga'),
                        'stok' => $this->input->post('stok'),
                        'gambar' => $file['file_name'],
                        'deskripsi' => $this->input->post('deskripsi'),
                        'waktu' => date('Y-m-d H:i:s')
                    ];
                    $this->MyModel->editProduk($id, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/produk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/produk/edit/'.$id);
                }
            }
        }
        
    }
    // Transaksi
    public function transaksi() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['user'] = $this->MyModel->getUser();
        if($this->input->post('search')) {
            
            $data['invoices'] = $this->MyModel->getInvoicesSearch($this->input->post('search'));
        } else {
            
            $data['invoices'] = $this->MyModel->getInvoices();
        }
        // $data['status'] = ['unpaid','paid','kadaluarsa'];
        $this->load->view('layout/admin-header', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('layout/admin-footer');
    }

    public function proses_transaksi($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['invoices'] = $this->MyModel->getInvoicesByID($id);
        $data['status'] = ['unpaid','paid','kadaluarsa','dikemas','dikirim','sampai'];
        $data['produk'] = $this->MyModel->getProduk();
        $data['transaksi'] = $this->MyModel->getTransaksiByInvoices($id);

        
        $this->form_validation->set_rules('no_resi', 'No Resi', 'required|trim');
        $this->form_validation->set_rules('jasa_pengiriman', 'Jasa Pengiriman', 'required|trim');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required|trim');
        

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/transaksi_proses', $data);
            $this->load->view('layout/admin-footer');
        } else {
            $data = [
                'no_resi' => $this->input->post('no_resi'),
                'jasa_pengiriman' => $this->input->post('jasa_pengiriman'),
                'ongkir' => $this->input->post('ongkir'),
                'status' => $this->input->post('status')
            ];
            $this->db->where('id',$id);
            $this->db->update('invoices',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/transaksi');
        }
        

    }
    public function deleteTransaksi($id) {
        $this->_deleteInvoicesImg($id);
        $this->MyModel->deleteTransaksi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/transaksi');
    }

    // User
    public function user() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        if($this->input->post('search')) {

            $data['user'] = $this->MyModel->getUserSearch($this->input->post('search'));
        } else {

            $data['user'] = $this->MyModel->getUser();
        }
        $data['role_id'] = $this->MyModel->getRoleID();
        $this->load->view('layout/admin-header', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('layout/admin-footer');
    }

    public function addUser() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');

        $data['role_id'] = $this->MyModel->getRoleID();
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/user-add', $data);
            $this->load->view('layout/admin-footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => $this->input->post('role_id')
                
            ];
            $this->MyModel->addUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('admin/user');
        }
        
    }

    public function delUser($id) {
        $this->MyModel->delUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        redirect('admin/user');
    }

    public function editUser($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');

        $data['role_id'] = $this->MyModel->getRoleID();
        $data['user'] = $this->MyModel->getUserByID($id);
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/user-edit', $data);
            $this->load->view('layout/admin-footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => $this->input->post('role_id')
            ];
            $this->MyModel->editUser($id,$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('admin/user');
        }
        
    }

    public function changepassword($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['user'] = $this->MyModel->getUserByID($id);
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password Baru', 'required|trim|matches[password1]');

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/admin-header', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('layout/admin-footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password1');
            if(!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/user/changepassword/'.$id);
            } else {
                if($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/user/changepassword/'.$id);
                } else {
                    $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('id_user', $id);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/user');
                }
            }
        }
        
    }

    private function _deletePromoImg($id) {
        $img = $this->MyModel->getPromoByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./asset/img/promo/$filename.*"));
    }

    private function _deleteProdukImg($id) {
        $img = $this->MyModel->getProdukByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./asset/img/produk/$filename.*"));
    }
    
    private function _deleteInvoicesImg($id) {
        $img = $this->MyModel->getInvoicesByID($id);
        $filename = explode('.', $img['bukti_transfer'])[0];
        return array_map('unlink', glob(FCPATH."./asset/img/bukti_transfer/$filename.*"));
    }
		
	private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
        
    /* End of file  Admin.php */
        
                            