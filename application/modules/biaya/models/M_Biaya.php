<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Biaya extends CI_Model
{
    protected $TABLE_NAME = "jenis_biaya";
    public function get_all()
    {
        return $this->db->get($this->TABLE_NAME);
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->TABLE_NAME, ['id' => $id]);
    }
    public function insert($data)
    {
        return $this->db->insert($this->TABLE_NAME, $data);
    }
    public function update($data)
    {
        return $this->db->update($this->TABLE_NAME, $data, ['id' => $data['id']]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->TABLE_NAME, array('id' => $id));
    }
}
