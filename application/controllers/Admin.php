<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['members'] = $this->Data_model->getAllData();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function manage()
    {
        $data['members'] = $this->Data_model->getAllData();
        $data['title'] = "Manage Member";

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|numeric');
        $this->form_validation->set_rules('tanggal_gabung', 'Tanggal gabung', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/manage', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->tambah();
            redirect('Admin/manage');
        }
    }
}
