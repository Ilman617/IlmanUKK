<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataadmin extends CI_Controller
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
       $data['petugas'] = $this->M_petugas->tampil_data()->result();
       $data['title'] =" Data Admin";
       $this->load->view('templates/header',$data);
       $this->load->view('templates/sidebar');
       $this->load->view('admin/dataadmin',$data);
       $this->load->view('templates/footer');
   }

   public function tambah_regist()
   {
       $nama_petugas     = $this->input->post('nama_petugas');
       $username    = $this->input->post('username');
       $password     = $this->input->post('password');
       $id_level     = $this->input->post('id_level');
       
       $data = array(
           'nama_petugas'      => $nama_petugas,
           'username'      => $username,
           'password'      => md5($password),
           'id_level'      => $id_level
       );

       $this->M_petugas->tambah_regist($data, 'tb_petugas');
       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan!</strong>
            <button type="button class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('admin/dataadmin/index');
   }

   public function editregist($id)
   {
       $where = array('id_petugas' => $id);
       $data['title'] = "Edit Registrasi";
       $data['petugas'] = $this->M_petugas->edit_petugas($where, 'tb_petugas')->result();
       $this->load->view('templates/header', $data);
       $this->load->view('templates/sidebar');
       $this->load->view('admin/edit_regist', $data);
       $this->load->view('templates/footer');
   }

   public function update()
   {
       $id             = $this->input->post('id_petugas');
       $nama_petugas       = $this->input->post('nama_petugas');
       $username     = $this->input->post('username');
       $password           = $this->input->post('password');
        $id_level           =$this->input->post('id_level');

       $data = array(
           'nama_petugas'      => $nama_petugas,
           'username'    => $username,
           'password'    => $password,
           'id_level'      => $id_level,
        
       );

       $where = array(
           'id_petugas' => $id
       );

       $this->M_petugas->update_data($where, $data, 'tb_petugas');
       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil diupdate!</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
       redirect('admin/dataadmin/index');
   }

   public function hapus($id)
   {
       $where = array('id_petugas' => $id);
       $this->M_petugas->hapus_data($where, 'tb_petugas');
       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Data Berhasil dihapus!</strong>
            <button type="button class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('admin/dataadmin/index');
   }
 }