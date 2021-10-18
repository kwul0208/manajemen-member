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


    public function detail($id)
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->Data_model->getById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }


    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/editProfile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $kelas = $this->input->post('kelas');
            $hobi = $this->input->post('hobi');
            $email = $this->session->userdata('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    // cek gambar lama agar tidak dihapus
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    // end
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('kelas', $kelas);
            $this->db->set('hobi', $hobi);
            $this->db->where('email', $email);
            $this->db->update('user');

            redirect('User');
        }
    }

    public function pengumuman()
    {
        $data['title'] = 'pengumuman';

        $data['pengumuman'] = $this->Data_model->getPengumuman();
        $data['komentar'] = $this->Data_model->getAllKomentar();

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

    public function komentar($id)
    {
        $data['title'] = 'Komentar';
        $data['pengumuman'] = $this->Data_model->getPengumumanById($id);
        $data['komentar'] = $this->Data_model->getKomentarById($id);

        $this->form_validation->set_rules('komen', 'Komantar', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/komentar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Data_model->postKomentar($id);

            $this->session->set_flashdata('message', '<div class="alert alert-primary m-3" role="alert">Komentar anda sukses terkirim</div>');
            redirect('User/komentar/' . $id . '/' . $this->session->userdata['id']);
        }
    }
}
