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

    public function EditUser($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->Data_model->getById($id);

        $this->form_validation->set_rules('role_id', 'role_id', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->editUserModel($id);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            berhasil diubah
          </div>');
            redirect('Admin');
        }
    }

    public function hapusUser($id)
    {
        $user = $this->db->get_where('user', ['id' => $id])->row_array();

        if ($user['role_id'] === '1') {
            $this->db->where('id', $id);
            $this->db->delete('user');
            $this->session->set_flashdata('flash', '
            berhasil dihapus
        ');
            redirect('Admin/manage');
        } else if ($user['role_id'] === '2') {
            $this->db->where('id', $id);
            $this->db->delete('user');
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                    berhasil dihapus
                </div>');
            redirect('Admin');
        }
    }


    public function tambahAdmin()
    {
        $data['title'] = 'Tambah Data';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password1', 'Password 1', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password 2', 'required|matches[password1]');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->tambahAdminModel();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('Admin/manage');
        }
    }

    // status
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
