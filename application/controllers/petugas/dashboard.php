<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
       parent::__construct();
        // is_logged_in();
        if ($this->session->userdata('id_level') != '2') {
           $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"
           role="alert">
                   <strong>Anda Belum Login</strong>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                   </button>
                   </div>');
               redirect('auth');
        }
    }
    

    public function index()
    {
        $id_barang = $this->db->query("SELECT * FROM tb_petugas");
        $barang = $this->db->query("SELECT * FROM tb_barang");
        $masyarakat = $this->db->query("SELECT * FROM tb_masyarakat");
        $lelang = $this->db->query("SELECT * FROM tb_lelang");
        $administrator = $this->db->query("SELECT * FROM tb_petugas");
        $data['petugas'] = $id_barang->num_rows();
        $data['lelang'] = $lelang->num_rows();
        $data['masyarakat'] = $lelang->num_rows();
        $data['barang'] = $lelang->num_rows();
        $data['administrator'] = $administrator->num_rows();


        $data ['title'] = 'Dashboard Petugas ';
        $data['tb_petugas'] = $this->db->get_where('tb_petugas',
        ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_petugas/header', $data);
        $this->load->view('templates_petugas/sidebar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer', $data);

    
}
}