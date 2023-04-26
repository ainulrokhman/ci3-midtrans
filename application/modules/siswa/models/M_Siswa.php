<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('siswa')->result_array();
    }
}