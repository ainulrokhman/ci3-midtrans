<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DatatableServerSideModel extends CI_Model
{
    private $TABLE_NAME;
    private $FIELDS;

    public function setTableName($TABLE_NAME)
    {
        $this->TABLE_NAME = $TABLE_NAME;
    }

    public function setFiled($FIELDS)
    {
        $this->FIELDS = $FIELDS;
    }

    private function _getData()
    {
        $this->db->from($this->TABLE_NAME);
        if (isset($_POST['search']['value'])) {
            for ($i = 0; $i < sizeof($this->FIELDS); $i++) {
                if ($i == 0) {
                    $this->db->like($this->FIELDS[$i], $_POST['search']['value']);
                } else {
                    $this->db->or_like($this->FIELDS[$i], $_POST['search']['value']);
                }
            }
        }

        if (isset($_POST['order'])) {
            $this->db->order_by(($_POST['order'][0]['column'] + 1), $_POST['order'][0]['dir']);
        }
    }

    private function getDataTable()
    {
        $this->_getData();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function count_filtered_data()
    {
        $this->_getData();

        $query = $this->db->get();
        return $query->num_rows();
    }

    private function count_all_data()
    {
        $this->db->from($this->TABLE_NAME);
        return $this->db->count_all_results();
    }

    public function get()
    {
        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->count_all_data(),
            'recordsFiltered' => $this->count_filtered_data(),
            'data' => $this->getDataTable()
        ];

        return $output;
    }
}
