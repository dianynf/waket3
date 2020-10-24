<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontribusimhs_model extends CI_Model
{
    public function getAllDana()
    {
        return $this->db->get('dana')->result_array();
    }

    public function getData($table)
    {
        return $this->db->get($table)->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function editdata($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getKontribusimhsById($id)
    {
        return $this->db->get_where('kontribusimhs', ['id' => $id])->row_array();
    }

    public function editDataDana()
    {
        $data = [
            "nama_donatur" => $this->input->post('nama_donatur', true),
            "perusahaan" => $this->input->post('perusahaan', true),
            "alamat" => $this->input->post('alamat', true),
            "dana" => $this->input->post('dana', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dana', $data);
    }

    public function deleteDataKontribusimhsById($id)
    {
        $this->db->delete('kontribusimhs', ['id' => $id]);
    }
}
