<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontribusimhs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Kontribusimhs_model');
        $this->load->model('Beastudi_model', 'pic');

        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kontribusi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kontribusi'] = $this->pic->getData('kontribusi');
        $data['beastudi'] = $this->pic->getData('beastudi');
        $data['kontribusimhs'] = $this->db->get('kontribusimhs')->result_array();

        $this->form_validation->set_rules('nama_mh', 'Nama', 'required|unique');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusimhs/index', $data);
        $this->load->view('templates/footer');
    } else {
        $data = [
            'nama_id' => $this->input->post('nama_mh'),
            'kontribusi_id' => $this->input->post('kontribusi'),
            'date' => $this->input->post('date')
        ];
        $this->Kontribusimhs_model->insertData('kontribusimhs', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontribusi Mahasiswa baru ditambahkan!</div>');
        redirect('kontribusimhs');
        }
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_id', 'Nama', 'required|unique');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'nama_id' => $this->input->post('nama_mh'),
            'kontribusi_id' => $this->input->post('kontribusi'),
            'date' => $this->input->post('date')
        ];
        $this->Kontribusimhs_model->insertData('kontribusimhs', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontribusi Mahasiswa baru ditambahkan!</div>');
        redirect('kontribusimhs');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Kontribusi Mahasiswa';
        $data['kontribusimhs'] = $this->Kontribusimhs_model->getKontribusimhsById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusimhs/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kontribusi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['kontribusimhs'] = $this->Kontribusimhs_model->editdata($where, 'kontribusimhs')->result();
        $data['kontribusi'] = $this->Beastudi_model->getData('kontribusi');
        $data['kontribusi'] = $this->pic->getData('kontribusi');
        $data['beastudi'] = $this->pic->getData('beastudi');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusimhs/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'nama_id' => $this->input->post('nama_mh'),
            'kontribusi_id' => $this->input->post('kontribusi'),
            'date' => $this->input->post('date'),
        ];

        $id = ['id' => $this->input->post('id')];
        $this->Kontribusimhs_model->update_data($id, $data, 'kontribusimhs');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontribusi Mahasiswa Berhasil di Edit!</div>');
        redirect('kontribusimhs');
    }

    public function delete($id)
    {
        $this->Kontribusimhs_model->deleteDataKontribusimhsById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Beastudi di hapus!</div>');
        redirect('kontribusimhs');
    }
}
