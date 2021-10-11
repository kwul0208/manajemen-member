<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
        $this->load->library('form_validation');
        cek_loggin();
    }

    public function index()
    {
        $data['title'] = 'My Profile';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function pengumuman()
    {
        $data['title'] = 'pengumuman';

        $data['pengumuman'] = $this->Data_model->getPengumuman();
        $this->form_validation->set_rules('post', 'Post', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/pengumuman', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->newPengumuman();
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Post anda sukses terkirim</div>');
            redirect('User/pengumuman');
        }
    }
}
