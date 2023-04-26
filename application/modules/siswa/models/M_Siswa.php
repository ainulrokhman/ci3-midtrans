<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('v_kelas_siswa')->result_array();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where('siswa', ['id' => $id])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('siswa', $data);
    }
    public function update($data)
    {
        $this->db->update['siswa'];
    }
}