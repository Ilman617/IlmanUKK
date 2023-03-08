<?php

class Datalelang extends CI_Controller
{
    public function __construct()
    {
    
        parent::__construct();
    
        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
            <button type="button class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('auth');
        }
    }
   
    public function index()
    {
        $args  ['auctions'] = $this->M_lelang->all();
        $args ['title'] = "Data Lelang";
        // $args ['auctions'] = $this->db->get('tb_lelang')->result_array();


        $this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/datalelang', $args);
        $this->load->view('templates_petugas/footer');
        // var_dump($args); die;
    }

    public function create()
    {
        if ($this->input->post('save')) {
            $errors = $this->_create_process();
        }
        $this->load->model(['M_masyarakat', 'M_petugas', 'M_barang']);
        $args = [
            'users'   => $this->db->get('tb_masyarakat')->result(),
            'petugas' => $this->db->get('tb_petugas')->row_array(),
            'users'   => $this->M_masyarakat->all(),
            'products'   => $this->M_barang->all(),
            'staffs'   => $this->M_petugas->all(),
        ];
        $args['title'] = "Form Tambah Lelang";
        $this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/tambahlelang', $args);
        $this->load->view('templates_petugas/footer');
    }

    private function _create_process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product', 'Product', 'required');
        $this->form_validation->set_rules('tgl_lelang', 'Auction date', 'required');
        // $this->form_validation->set_rules('tanggal_akhir', 'Auction date', 'required');
        $this->form_validation->set_rules('jam_lelang', 'Auction time');
        $this->form_validation->set_rules('user', 'Auctioneer');
        $this->form_validation->set_rules('petugas', 'Petugas');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()) {
            $tgl_lelang = set_value('tgl_lelang') . ' ' . set_value('jam_lelang') . ':00';
            $this->M_lelang->id_lelang = set_value('tanggal_akhir');
            $this->M_lelang->id_barang = set_value('product');
            $this->M_lelang->tgl_lelang = $tgl_lelang;
            $this->M_lelang->id_user = null;
            $this->M_lelang->id_petugas = $this->session->userdata('id_petugas');
            $this->M_lelang->status = set_value('status');

            $this->M_lelang->save();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <strong>Data Berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div');
        redirect('petugas/datalelang/index');
        }
    }


    public function edit($id)
    {
        if($this->input->post('save')){
            $errors = $this->_edit_process($id);
        }
        $this->load->model(['M_masyarakat', 'M_barang', 'M_petugas']);
        $args = [
            'users'  => $this->M_masyarakat->all(),
            'products'  => $this->M_barang->all(),
            'staffs'  => $this->M_petugas->all(),
            'auction'  =>$this->M_lelang->first($id)
        ];
        
        $args ['title'] = "Edit Data Lelang";
        $this->load->view('templates_petugas/header',$args);
        $this->load->view('templates_petugas/sidebar',$args);
        $this->load->view('petugas/lelang/editlelang',$args);
        $this->load->view('templates_petugas/footer');


    }

    private function _edit_process($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jam_lelang', 'Auction time', 'required');
        $this->form_validation->set_rules('product', 'Product', 'required');
        $this->form_validation->set_rules('tgl_lelang', 'Auction date', 'required');
        // $this->form_validation->set_rules('tanggal_lahir', 'Auction date', 'required');
        $this->form_validation->set_rules('user', 'Auctioneer', 'required');
        $this->form_validation->set_rules('petugas', 'Staff', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()) {
            $tgl_lelang = set_value('tgl_lelang') . ' ' . set_value('jam_lelang') . ':00';
            //$this->M__lelang->id_lelang = set_value('tanggal_akhir');
            $this->M_lelang->id_barang = set_value('product');
            $this->M_lelang->tgl_lelang = $tgl_lelang;
            $this->M_lelang->id_user = set_value('user');
            $this->M_lelang->id_petugas = set_value('petugas');
            $this->M_lelang->status = set_value('status');

            $this->M_lelang->update($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <strong>Data Berhasil dilelang!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div');
            redirect('petugas/datalelang/index');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert">
        <strong>Data Berhasil diupdate!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('petugas/datalelang/edit/' . $id);
    }


public function delete($id)
{
    $this->db->where('id_lelang',$id);
    $this->db->delete('tb_lelang');
    $this->session->set_flashdata(
        'message', '<div class="alert alert-success alert-dismissible fade show"role="alert">
        <strong>Data Berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('petugas/datalelang/');


    } 

   public function view($id)
   {
       $product = $this->M_lelang->first($id);

       $args = [
           'product'   => $product,
           'history'     => $this->M_lelang->history($id),
           'max_bid'     => $this->M_lelang->max_bid($id),
       ];

       //    var_dump($product); die;
       $args ['title'] = "Data Bid";
       $this->load->view('templates_petugas/header', $args);
       $this->load->view('templates_petugas/sidebar', $args);
       $this->load->view('petugas/lelang/view', $args);
       $this->load->view('templates_petugas/footer');
   }

   public function finish($id)
   {
    if($this->input->post('finish')){
        $errors = $this->_finish_process($id);
   }
//    $this->db->get('tb_lelang');
   $args = [
    'product'     => $this->M_lelang->first($id),
    'errors'     => isset($errors) ? $errors : [],
];

$args ['title'] = "Data Finish";
$this->load->view('templates_petugas/header', $args);
$this->load->view('templates_petugas/sidebar', $args);
$this->load->view('petugas/lelang/finish', $args);
$this->load->view('templates_petugas/footer');
}

public function _finish_process($id)
{
    $max = $this->M_lelang->max_bid($id); //mengarah ke model lelang max bid (tawar tertinggi)
    $this->M_lelang->harga_akhir = $max->penawaran_harga; //jika ya harga akhir akan masuk ke db history penawar harga
    $this->M_lelang->status = 'ditutup'; //jika ya status akan tertutup
    $this->M_lelang->id_user = $max->id_user; //id usernya siapa
    $this->M_lelang->update($id); //mengubah

    $this->db->where('id_barang', $max->id_barang);
    $this->db->update('tb_barang', ['status_barang' => 'terjual']);

    $this->session->set_flashdata(
        'message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Lelang telah diselesaikan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span  aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('petugas/datalelang/');

        return [];
    }

    
}
        