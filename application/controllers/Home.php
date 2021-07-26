<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('MyModel');
    }

    public function index() {
        $data['kategori'] = $this->MyModel->getKategori();
        $data['promo'] = $this->MyModel->getPromoHome();
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));

        if($this->input->post('search')) {
            if($this->uri->segment(2)) {
                $data['produk'] = $this->MyModel->getProdukHomeSearcByKategori($this->input->post('search'),$this->uri->segment(2));
            } else {
                $data['produk'] = $this->MyModel->getProdukHomeSearch($this->input->post('search'));
            }
        }  else {
            if($this->uri->segment(2)) {
                $data['produk'] = $this->MyModel->getProdukHomeByKategori($this->uri->segment(2));
            } else {
                $data['produk'] = $this->MyModel->getProdukHome();
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('home', $data); 
        $this->load->view('layout/footer');    
    }

    public function add_cart($produk_id) {
        $produk = $this->MyModel->getProdukByID($produk_id);
        $data = [
            'id' => $produk['id_produk'],
            'qty' => 1,
            'price' => $produk['harga'],
            'name' => $produk['nama_produk'],
			'type' => $produk['kategori'],
        ];
        $this->cart->insert($data);
        redirect(base_url(''));
    }

    public function clear_cart() {
        $this->cart->destroy();
        redirect(base_url(''));
    }

    public function order() {
        $cek = [];
        foreach($this->cart->contents() as $items) {
            $produk = $this->MyModel->getProdukByID($items['id']);
            $hasil = $produk['stok'] -  $items['qty'];
            array_push($cek, $hasil);
        }

        $cek_n = 0;
        foreach($cek as $ck) {
            if($hasil < 1) {
                
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Stok habis!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url(''));

            } else {
                $cek_n = 1;
            }
        }
        
        if($cek_n == 1) {
            $invoices = [
                'date' => date('Y-m-d H:i:s'),
                'du_date' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1, date('Y'))),
                'status' => 'unpaid',
                'id_user' => $this->session->userdata('id_user'),
                
            ];
            $this->db->insert('invoices', $invoices);
            $invoices_id = $this->db->insert_id();
                    
            foreach($this->cart->contents() as $item) {
                $data = [
                            'id_invoices' => $invoices_id,
                            'id_produk' => $item['id'],
                            'jml' => $item['qty'],
                        ];         
                            
                $produk = $this->MyModel->getProdukByID($data['id_produk']);
                            
                $stok = $produk['stok'];
                $hasil = $stok - $data['jml'];
                            
                $this->db->where('id_produk', $produk['id_produk']);
                $this->db->set('stok', $hasil);
                $this->db->update('produk');
                            
                
                $this->db->insert('transaksi', $data);
            }
            $this->cart->destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(base_url('transaksi'));
        }
    }

    public function transaksi() {
        $data['invoices'] = $this->MyModel->getInvoicesByUser($this->session->userdata('id_user'));
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->MyModel->getKategori();
        $this->load->view('layout/header', $data);
        $this->load->view('user/transaksi', $data); 
        $this->load->view('layout/footer');
    }

    public function detail_transaksi($id) {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['invoices'] = $this->MyModel->getInvoicesByID($id);
        $data['transaksi'] = $this->MyModel->getTransaksiByInvoices($id);
        $data['kategori'] = $this->MyModel->getKategori();
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('user/transaksi_detail', $data); 
        $this->load->view('layout/footer');
        
        
    }

    public function upload_bukti() {
        $id = $this->input->post('id');
        $this->_deleteInvoicesImg($id);
        if(empty($_FILES['bukti_transfer']['name'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal! Gambar tidak boleh kosong!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect(base_url('transaksi/detail/').$id);    
        } else {

            $config = [
                'file_name' => $id.'-bukti_transfer-'.date('d-m-Y'),
                'upload_path' => './asset/img/bukti_transfer/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload',$config);
    
            if($this->upload->do_upload('bukti_transfer')) {
                $file = $this->upload->data();
                $data = [
                    'bukti_transfer' => $file['file_name'],
                ];
                $this->MyModel->prosesTransaksi($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url('transaksi/detail/').$id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url('transaksi/detail/').$id);
            }
        }
    }

    public function user() {
        
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->MyModel->getKategori();    

        $this->load->view('layout/header', $data);
        $this->load->view('user/user', $data); 
        $this->load->view('layout/footer');
    }

    public function user_edit() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->MyModel->getKategori(); 

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('user/user-edit', $data); 
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->MyModel->editUser($this->session->userdata('id_user'),$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('user');
        }
        
    }

    public function changepassword() {
        $data['usx'] = $this->MyModel->getUserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->MyModel->getKategori(); 

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password Baru', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('user/user-changepassword', $data); 
            $this->load->view('layout/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password1');
            if(!password_verify($password_lama, $data['usx']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('user/changepassword/');
            } else {
                if($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('user/changepassword/');
                } else {
                    $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('user');
                }
            }
        }
        

    }

    private function _deleteInvoicesImg($id) {
        $img = $this->MyModel->getInvoicesByID($id);
        $filename = explode('.', $img['bukti_transfer'])[0];
        return array_map('unlink', glob(FCPATH."./asset/img/bukti_transfer/$filename.*"));
	}
	
	
    
        
}
        
    /* End of file  Home.php */
        
                            