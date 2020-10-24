<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Beastudi_model');

		$this->load->model('Pic_model');
		$this->load->model('Beastudi_model', 'pic');
		// di tendang supaya user tdk masuk sembarangan lewat url
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'role' => $this->input->post('role')
			];
			$this->db->insert('user_role', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role User Berhasil Ditambahkan!</div>');
			//$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/role');
		}
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// intinya ada 2 hal. 1 role id nya berapa kemudian tampilkan semua menu                            
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		//cek ketika di ceklis maka akan bertamah. ketika di hilangin maka akan terhapus
		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		//query berdasarkan data di atas
		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Berubah!</div>');
	}

	//tambah users
	public function users()
	{
		$data['title'] = 'Users';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// load submenu yg di bawah
		$this->load->model('User_model', 'user');
		//query submenu
		//model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
		$data['users'] = $this->user->getAllUser();
		$data['role'] = $this->pic->getData('user_role');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/users', $data);
			$this->load->view('templates/footer');
		} else {
			// $data = [
			//     'title' => $this->input->post('title'),
			//     'menu_id' => $this->input->post('menu_id'),
			//     'url' => $this->input->post('url'),
			//     'icon' => $this->input->post('icon'),
			//     'is_active' => $this->input->post('is_active')
			// ];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru ditambahkan!</div>');
			redirect('user/users');
		}
	}

	public function tambahuser()
	{
		$this->load->model('Beastudi_model');

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => htmlspecialchars($this->input->post('role_id', true)),
			'is_active' => 1,
			'date_created' => time()
		];

		// siapkan token 
		$token = base64_encode(random_bytes(32));
		//mengambil data dari 91        
		$user_token = [
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('user', $data);
		$this->db->insert('user_token', $user_token);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda telah menambahkan akun baru</div>');
		redirect('admin/users');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ardiansyahbugas@gmail.com',
			'smtp_pass' => '200616Ynf',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		//$this->load->library('email', $config);
		$this->email->initialize($config);  //tambahkan baris ini

		$this->email->from('ardiansyahbugas@gmail.com', 'Matla');
		$this->email->to($this->input->post('email'));
		// untuk cek apakah $type == 'verify' untuk verifikasi akun
		// untuk cek apakah $type == 'verify' untuk verifikasi akun
		if ($type == 'verify') {
			$this->email->subject('Aktivasi Akun');
			$this->email->message('
            <h1>Selamat anda telah berhasil terdaftar!</h1><br><br>
            <p>Tinggal selangkah lagi akun anda akan aktif.<br>
            Klik link aktivasi ini untuk mengaktifkan akun anda: <strong><a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a></strong>
            <br><br>
            Masa aktif link 1x24, lebih dari itu anda harus mendaftar ulang.</p>
            ');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('
            <p>Klik link ini untuk reset password akun anda: <strong><a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a></strong>
            <br><br>
            Masa aktif link 1x24, lebih dari itu anda harus melakukan reset ulang.</p>
            ');
		}

		// if ($type == 'verify') {
		//     $this->email->subject('Account Verification');
		//     //cara baca nya : base_url(). di gabung ke controller auth and method verify ... setiap = berarti di gabung
		//     $this->email->message('Klik tautan ini untuk memverifikasi akun Anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
		// }

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		//ambil sebaris saja
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//cek email
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			//cek token
			if ($user_token) {
				//cek batas waktu sampai 24 jam
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					//klu bener. maka di update dgn menggunakan query builder
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					// ketika perintah di atas success maka di hapus tokennya
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Akun anda telah diaktifkan! Silahkan login.</div>');
					redirect('auth');
				} else {
					//kita hapus dulu data di dalam databse karena habis waktu untuk aktivasi
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token kedaluwarsa.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token anda salah.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Email yang salah.</div>');
			redirect('auth');
		}
	}


	// khusus admin masih error
	public function editusers($id)
	{
		$data['title'] = 'Edit Data Users';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id' => $id);
		$data['users'] = $this->User_model->editdata($where, 'user')->result();
		$data['role'] = $this->pic->getData('user_role');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/editusers', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$date_created = $this->input->post('date_created');

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'role_id' => $this->input->post('role_id'),
			'is_active' => $this->input->post('is_active'),
			'date_created' => $date_created
		);
		$id = ['id' => $id];
		$this->Beastudi_model->update_data($id, $data, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Users Berhasil di Edit!</div>');
		redirect('admin/users');
	}

	public function hapus($id)
	{
		$this->User_model->hapusDataUserById($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub Menu di hapus!</div>');
		redirect('admin/users');
	}
}
