<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapemenang extends CI_Controller
{
    //untuk memblokir akses langsung dari url
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }
    }


    public function index()
    {
        $data['masyarakat'] = $this->M_masyarakat->all();
        $data['title'] ="Data Masyarakat";
        $this->load->view('templates_petugas/header',$data);
        $this->load->view('templates_petugas/sidebar');
        $this->load->view('petugas/datapemenang',$data);
        $this->load->view('templates_petugas/footer');
    }
   }
