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
        $data['members'] = $this->Data_model->getAdmins();
        $data['title'] = "Manage Member";

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/manage', $data);
        $this->load->view('templates/footer');
    }







    public function ubahStatusAdmin($id)
    {
        $this->Data_model->statusActive($id);
        redirect('Admin/manage');
    }
    public function ubahStatusMember($id)
    {
        $this->Data_model->statusActive($id);
        redirect('Admin');
    }
}
