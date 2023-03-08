<?php

class Datapetugas extends CI_Controller
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
       $data['petugas'] = $this->M_petugas->tampil_data()->result();
       $data['title'] =" Data Petugas";
       $this->load->view('templates_petugas/header',$data);
       $this->load->view('templates_petugas/sidebar');
       $this->load->view('petugas/datapetugas',$data);
       $this->load->view('templates_petugas/footer');
   }
}
