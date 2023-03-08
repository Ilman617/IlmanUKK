<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_login');
    }

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login pages'; //untuk membuat judul halaman
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
        } else {
            // jika berhasil tervalidasi
            $this->_login();
        }
	}

    public function _login(){
        //input username dan password dan diarahkan di model
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->M_login->proses_login($username, $password);
        $cek = $this->M_login->cek_login($username, $password);
    }

    public function registration()
    {
        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required[tb_masyarakat.nama_lengkap]',
            ['required' => 'Nama wajib diisi']
        );
        $this->form_validation->set_rules('username', 'Username', 'required[tb_masyarakat.username]', [
            'required' => 'Username wajib diisi!'
        ]);

        $this->form_validation->set_rules('telp', 'Telp', 'required|min_length[12]', ['required' => 'telepon wajib diisi']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', [
            'required' => 'Password wajib diisi!',
            'matches' => 'Password tidak cocok'
        ]);

        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Registrasi";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = array(
                'id_user'             => '',
                'nama_lengkap'        => $this->input->post('nama_lengkap'),
                'username'            => $this->input->post('username'),
                'password'            => md5($this->input->post('password_1')),
                'telp'                => $this->input->post('telp'),
                'id_level'            => 3
            );


            $this->db->insert('tb_masyarakat', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil Mendaftar, Silahkan Login!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('auth/index');
        }
    }


    public function logout()
	{
		$this->session->sess_destroy(); 
		
		redirect('welcome');
	}
}
