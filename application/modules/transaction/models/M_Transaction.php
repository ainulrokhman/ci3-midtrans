<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaction extends CI_Model
{
    protected $TABLE_NAME = "tb_transaction";
    public function get_all()
    {
        return $this->db->get('v_trx');
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->TABLE_NAME, ['order_id' => $id]);
    }
    public function get_detail($id)
    {
        return $this->db->get_where('v_trx', ['order_id' => $id]);
    }
    public function update($data)
    {
        return $this->db->update($this->TABLE_NAME, $data, ['order_id' => $data['order_id']]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->TABLE_NAME, array('order_id' => $id));
    }
}
