<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beastudi_model');
		$this->load->model('Kontribusimhs_model');
		$this->load->model('Pic_model');
		$this->load->model('Beastudi_model', 'pic');
		// role access user
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Daftar Nama Beastudi';
		$data['pic'] = $this->Pic_model->getAllPic();
		$data['total_pic'] = $this->Pic_model->hitungJumlahPic();
		$data['total_beastudi'] = $this->Beastudi_model->hitungJumlahBeastudi();
		$data['semester'] = $this->pic->getData('semester');
		$data['programstudi'] = $this->pic->getData('programstudi');
		$data['kontribusi'] = $this->pic->getData('kontribusi');
		//$data['kontribusimhs'] = $this->pic->getData('date');

		// $data['beastudi'] = $this->pic->getBeastudi();
		$data['beastudi'] = $this->pic->tampil_data();
		$data['pic'] = $this->db->get('pic')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
