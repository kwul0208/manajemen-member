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
            "role_id" => '1',
            "date_created" => time()
        ];

        $this->db->insert('user', $data);
    }

    public function tambahUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "image" => 'default.jpg',
            "password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
            "date_created" => time(),
            "role_id" => '2',
            "status" => 'pending'
        ];

        $this->db->insert('user', $data);
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['status'] === 'active') {
                    if ($user['role_id'] === '1') {
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'nama' => $user['nama'],
                            'image' => $user['image']
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin');
                    } else if ($user['role_id'] === '2') {
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'nama' => $user['nama'],
                            'image' => $user['image']
                        ];
                        $this->session->set_userdata($data);
                        redirect('User');
                    } else if ($user['role_id'] === '3') {
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'nama' => $user['nama'],
                            'image' => $user['image']
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin');
                    }
                } else {
                    $this->session->set_flashdata('message',  '<p> kamu belum diverifikasi admin, tunggu yah</p>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message',  '<p>password kamu salah</p>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<p> kamu tidak terdaftar, silahkan daftar dulu yah </p>');
            redirect('Auth');
        }
    }
}
