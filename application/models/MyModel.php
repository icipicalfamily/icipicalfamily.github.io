<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MyModel extends CI_Model {
    
    // Promo
    public function getPromo() {
        return $this->db->get('promo')->result_array();
    }
    public function getPromoSearch($keyword) {
        $this->db->like('nama_promo', $keyword);
        return $this->db->get('promo')->result_array();
    }
    public function getPromoByID($id) {
        return $this->db->get_where('promo', ['id_promo' => $id])->row_array();
    }
    public function addPromo($data) {
        $this->db->insert('promo', $data);
    }
    public function delPromo($id) {
        $this->db->where('id_promo', $id);
        $this->db->delete('promo');
    }
    public function editPromo($id, $data) {
        $this->db->where('id_promo', $id);
        $this->db->update('promo', $data);
    }
                        
    // Produk
    public function getProduk() {
        return $this->db->get('produk')->result_array();
    }  
    public function getProdukSearch($keyword) {
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('kategori', $keyword);
        return $this->db->get('produk')->result_array();
    }
    public function getProdukByID($id) {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }
    public function addProduk($data) {
        $this->db->insert('produk', $data);
    }
    public function delProduk($id) {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }
    public function editProduk($id, $data) {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    
    public function getKategori() {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriByID($id) {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    // Transaksi
    
    public function getInvoices() {
        $this->db->order_by('date','desc');
        $this->db->join('user','user.id_user = invoices.id_user','left');
        return $this->db->get('invoices')->result_array();
    }
    public function getInvoicesSearch($keyword) {
        $this->db->like('id',$keyword);
        $this->db->or_like('username',$keyword);    
        $this->db->join('user','user.id_user = invoices.id_user','left');
        return $this->db->get('invoices')->result_array();
    }
    public function getInvoicesByID($id) {
        $this->db->join('user','user.id_user = invoices.id_user','left');
        return $this->db->get_where('invoices', ['id' => $id])->row_array();
    }
    public function getTransaksiByInvoices($id) {
        $this->db->join('invoices','invoices.id = transaksi.id_invoices','left');
        return $this->db->get_where('transaksi', ['id_invoices' => $id])->result_array();
    }
    public function deleteTransaksi($id) {
        $this->db->where('id_invoices', $id);
        $this->db->delete('transaksi'); 

        $this->db->where('id', $id);
        $this->db->delete('invoices');
    }

    public function prosesTransaksi($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('invoices', $data);
    }

    // User
    public function getUser() {
        return $this->db->get('user')->result_array();
    }
    public function getUserByID($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
    public function addUser($data) {
        $this->db->insert('user', $data);
    }
    public function delUser($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
    public function editUser($id, $data) {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function getUserSearch($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('user')->result_array();
    }


    // Role ID
    public function getRoleID() {
        return $this->db->get('role_id')->result_array();
    }

    // Home
    public function getPromoHome() {
        return $this->db->get('promo', 6)->result_array();
    }
    public function getProdukHome() {
        $this->db->order_by('nama_produk','asc');
        return $this->db->get('produk')->result_array();
    }
    public function getProdukHomeSearch($keyword) {
        $this->db->order_by('nama_produk','asc');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('kategori', $keyword);
        return $this->db->get('produk')->result_array();
    }

    public function getProdukHomeByKategori($kategori) {
        $this->db->order_by('nama_produk','asc');
        return $this->db->get_where('produk', ['kategori' => $kategori])->result_array();
    }

    public function getProdukHomeSearcByKategori($keyword, $kategori) {
        $this->db->order_by('nama_produk','asc');
        $this->db->like('nama_produk', $keyword);
        return $this->db->get_where('produk', ['kategori' => $kategori])->result_array();
    }

    public function getInvoicesByUser($id) {
        $this->db->order_by('date', 'desc');
        return $this->db->get_where('invoices', ['id_user' => $id])->result_array();
    }

}
                        
/* End of file MyModel.php */
    
                        