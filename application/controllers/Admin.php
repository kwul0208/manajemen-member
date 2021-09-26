<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/manage', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = "tambah Member";

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|numeric');
        $this->form_validation->set_rules('tanggal_gabung', 'Tanggal gabung', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->model_tambah();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('Admin/manage');
        }
    }

    public function edit($id)
    {
        $data['member'] = $this->Data_model->getById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|numeric');
        $this->form_validation->set_rules('tanggal_gabung', 'Tanggal gabung', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->model_edit($id);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('Admin/manage');
        }
    }

    public function hapus($id)
    {
        $this->Data_model->model_hapus($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('Admin/manage');
    }



    // kelola Admin
    public function kelolaAdmin()
    {
        $data['title'] = "Kelola Admin";
        $data['admins'] = $this->Data_model->getAdmins();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kelolaAdmin', $data);
        $this->load->view('templates/footer');
    }
}
