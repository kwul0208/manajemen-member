<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function tambahAdmin()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "role_id" => '2',
            "date_created" => time()
        ];

        $this->db->insert('admin', $data);
    }
}
