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

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                redirect('Admin');
            } else {
                $this->session->set_flashdata('message',  '<p> you are password is wrong</p>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<p> you are not Admin </p>');
            redirect('Auth');
        }
    }
}
