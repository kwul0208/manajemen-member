<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/auth_head', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->_login();
        }

        // cek session logout
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }
    }


    public function tambahAdmin()
    {
        $data['title'] = 'Tambah Admin';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password1', 'Password 1', 'required');
        $this->form_validation->set_rules('password2', 'Password 2', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/auth_head', $data);
            $this->load->view('auth/tambahAdmin');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->tambahAdmin();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('Admin/kelolaAdmin');
        }
    }

    public function tambahUser()
    {
        $data['title'] = 'Tambah User';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password1', 'Password 1', 'required');
        $this->form_validation->set_rules('password2', 'Password 2', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/auth_head', $data);
            $this->load->view('auth/tambahUser');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->tambahUser();
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">kamu berhasil mendaftar, silahkan tunggu konfirmasi oleh admin</div>');
            redirect('Auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        berhasil keluar
      </div>');
        redirect('Auth');
    }
}
