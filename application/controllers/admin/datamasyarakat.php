<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamasyarakat extends CI_Controller
{
    //untuk memblokir akses langsung dari url
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        if ($this->session->userdata('id_level') != '1') {
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
        $data['masyarakat'] = $this->M_masyarakat->tampil_data()->result();
        $data['title'] =" Data Masyarakat";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/datamasyarakat',$data);
        $this->load->view('templates/footer');
    }
   }
