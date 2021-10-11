<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get_where('user', ['role_id' => 2])->result_array();
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
            'nama' => $this->session->userdata['nama'],
            'image' => $this->session->userdata['image'],
            'post' => $this->input->post('post'),
            'date_post' => date($format)
        ];

        $this->db->insert('pengumuman', $data);
    }

    public function getPengumuman()
    {
        return $this->db->get('pengumuman')->result_array();
    }

    // end

    // for user only
    public function editUserModel($id)
    {
        $data = [
            "nama" => $this->input->post('nama')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }


    // public function model_tambah()
    // {
    //     $data = [
    //         "nama" => $this->input->post('nama', true),
    //         "posisi" => 'Member',
    //         "whatsapp" => $this->input->post('whatsapp', true),
    //         "tanggal_gabung" => $this->input->post('tanggal_gabung', true),
    //         "jurusan" => $this->input->post('jurusan', true),
    //     ];

    //     $this->db->insert('member', $data);
    // }



    // public function model_edit($id)
    // {
    //     $data = [
    //         "nama" => $this->input->post('nama', true),
    //         "posisi" => 'Member',
    //         "whatsapp" => $this->input->post('whatsapp', true),
    //         "tanggal_gabung" => $this->input->post('tanggal_gabung', true),
    //         "jurusan" => $this->input->post('jurusan', true),
    //     ];

    //     $this->db->where('id', $id);
    //     $this->db->update('member', $data);
    // }

    // public function model_hapus($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('member');
    // }


    // // kelola admin

    // public function getAdmins()
    // {
    //     return $this->db->get('admin')->result_array();
    // }
}
