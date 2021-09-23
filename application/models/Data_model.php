<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('member')->result_array();
    }

    public function tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "posisi" => 'Member',
            "whatsapp" => $this->input->post('whatsapp', true),
            "tanggal_gabung" => $this->input->post('tanggal_gabung', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];

        $this->db->insert('member', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('member', ['id' => $id])->row_array();
    }
}
