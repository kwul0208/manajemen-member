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

        $this->load->view('templates/auth_head', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
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
}
