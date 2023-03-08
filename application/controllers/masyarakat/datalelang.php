<?php
defined('BASEPATH') or exit('No direct sript access allowed');

class Datalelang extends CI_Controller
{
        //untuk memblokir akses langsung dari url
        public function __construct()
        {
            parent::__construct();
            //is_logged_in();
            if ($this->session->userdata('id_level') != '3') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
            }
        }




    public function bid($id)
    {
        
    $product = $this->M_lelang->first($id);
    if ($this->input->post('bid')) {
        $errors = $this->_bid_process($product);
        $product = $this->M_lelang->first($id);
    }
    $args = [
        'product'   => $product,
        'history'   =>$this->M_lelang->history($id),
        'max_bid'   =>$this->M_lelang->max_bid($id),
        'errors'    =>isset($errors) ? $errors : [],
        'success'   =>$this->session->flashdata('success'),
    ];

    $this->load->view('templates/user_header', $args);
    $this->load->view('petugas/lelang/bid', $args);
    $this->load->view('templates/user_footer');
    
    }

    

    private function _bid_process($product)
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than_equal_to[' . $product->harga_awal .']');
      if ($this->form_validation->run()) {
        $this->M_lelang->price = set_value('price');
        $this->M_lelang->id_lelang = $product->id_lelang;
        $this->M_lelang->id_barang = $product->id_barang;
        $this->M_lelang->id_user = uid();

        $this->M_lelang->save_bid();

        $this->session->set_flashdata('success', 'Bid telah ditambahkan');
        redirect('masyarakat/datalelang/bid/' . $product->id_lelang);
      } 
      
      return $this->form_validation->error_array();

    }
}
