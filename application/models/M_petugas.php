<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Petugas extends CI_Model 
{

    public function tampil_data()
    {
        return $this->db->get('tb_petugas');
    }

    public function tambah_regist($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_petugas($where, $table)
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

    public function first($username) {
        return $this->db->where('username', $username)
        ->join('tb_level', 'tb_level.id_level = tb_petugas.id_level')
        ->get('tb_petugas')->row_object();
    }

    public function all() {
        return $this->db->get('tb_petugas')->result_object();
    }
}