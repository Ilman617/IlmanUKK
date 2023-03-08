<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model 
{

    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function editbarang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_barang($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    // Model petugas pada dashboard datalelang

    public $name;
    public $price;
    public $desc;

    public function first($id)
    {
        return $this->db->where('id_barang', $id)->get('tb_barang')->row_object();
    }

    public function all()
    {
        return $this->db->order_by('id_barang', 'desc')->get('tb_barang')->result_object();
    }

    public function save() {
        $result = $this->db->set('nama_barang', $this->name)
                           ->set('tgl', date('Y-m-d'))
                           ->set('harga_awal', $this->price)
                           ->set('deskripsi_barang', $this->desc)
                           ->insert('tb_barang');
        $this->_reset();
        return $result;
    }

    public function update($id) {
        $result = $this->db->where('id_barang', $id)
                           ->set('nama_barang', $this->name)
                           ->set('tgl', data('Y-m-d'))
                           ->set('harga_awal', $this->price)
                           ->set('deskripsi_barang', $this->desc)
                           ->update('tb_barang');
        $this->reset();
        return $result;
    }

    public function delete($id) {
        return $this->db->where('id_barang', $id)->delete('tb_barang');
    }

    private function _reset() {
        $this->name = null;
        $this->price = null;
        $this->desc = null;
    }
}