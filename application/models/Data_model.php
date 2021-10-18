<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get_where('user', ['role_id !=' => 1])->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function getAdmins()
    {
        return $this->db->get_where('user', ['role_id' => 1])->result_array();
    }

    public function statusActive($id)
    {

        $user = $this->db->get_where('user', ['id' => $id])->row_array();

        if ($user['status'] == 'active') {
            $data = [
                "status" => 'pending'
            ];
        } else {
            $data = [
                "status" => 'active'
            ];
        }
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function tambahAdminModel()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "image" => 'default.jpg',
            "password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
            "date_created" => time(),
            "role_id" => 1,
            "status" => 'active'
        ];

        $this->db->insert('user', $data);
    }

    // pengumuman
    public function newPengumuman()
    {
        $format = "Y-m-d H:i";

        $data = [
            'id_user' => $this->session->userdata['id'],
            'post' => $this->input->post('post', true),
            'date_post' => date($format)
        ];

        $this->db->insert('pengumuman', $data);
    }

    public function getPengumuman()
    {
        $this->db->order_by('date_post', 'DESC');
        return $this->db->get('pengumuman')->result_array();
    }

    public function getPengumumanById($id)
    {
        return $this->db->get_Where('pengumuman', ['id' => $id])->row_array();
    }

    public function postKomentar($id)
    {
        $format = "Y-m-d H:i";
        $data = [
            'id_user' => $this->session->userdata['id'],
            'id_komentar' => $id,
            'komentar' => $this->input->post('komen', true),
            'date_post' => date($format)
        ];

        $this->db->insert('komentar', $data);
    }

    public function getAllKomentar()
    {
        return $this->db->get('komentar')->result_array();
    }

    public function getKomentarById($id)
    {
        return $this->db->get_where('komentar', ['id_komentar' => $id])->result_array();
    }

    // end

    // for user only
    public function editUserModel($id)
    {
        $data = [
            "role_id" => $this->input->post('role_id')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
