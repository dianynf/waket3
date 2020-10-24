<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi_model extends CI_Model
{

	public function getData($table)
	{
		return $this->db->get($table)->result();
	}

	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($id, $data, $table)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}



	public function getBeastudiById($id)
	{
		return $this->db->get_where('beastudi', ['id' => $id])->row_array();
	}

	//join table kontribusi_mhs
	public function getKontribusimhs()
	{
		$query = "SELECT `beastudi`.*, `kontribusimhs`.`date`
                  FROM `beastudi` JOIN `kontribusimhs`
                  ON `beastudi`.`mhs_id` = `kontribusimhs`.`id`
                ";
		return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
	}

	//join table pic
	public function getBeastudi()
	{
		$query = "SELECT `beastudi`.*, `pic`.`nama`
                  FROM `beastudi` JOIN `pic`
                  ON `beastudi`.`pic_id` = `pic`.`id`
                ";
		return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
	}

	//ADMIN. PIC. USER
	function tampil_data()
	{
		// $query = $this->db->query('SELECT * FROM `wp9d_wc_order_product_lookup` INNER JOIN wp9d_wc_customer_lookup ON wp9d_wc_order_product_lookup.customer_id=wp9d_wc_customer_lookup.customer_id JOIN user ON wp9d_wc_customer_lookup.email=user.email');
		// $query = $this->db->query('SELECT * FROM `wp9d_wc_customer_lookup` INNER JOIN user ON wp9d_wc_customer_lookup.email=user.email');
		// $query = $this->db->query("SELECT * FROM wp9d_wc_customer_lookup, user
		// WHERE wp9d_wc_customer_lookup.email=user.email
		// AND wp9d_wc_customer_lookup.email='$_SESSION[email]'");

		// $query = "SELECT `beastudi`.*, `pic`.`nama`
		//           FROM `beastudi` JOIN `pic`
		//           ON `beastudi`.`pic_id` = `pic`.`id`
		// 		";

		$query = "SELECT * FROM `beastudi` INNER JOIN `pic` ON beastudi.pic_id=pic.id WHERE beastudi.pic_id=pic.id";
		return $this->db->query($query)->result_array();
	}

	public function input_data($menu_id, $nama, $jk, $semester, $angkatan, $programstudi, $kontribusi)
	{
		$query = "INSERT INTO beastudi (nama_mh,jk,semester,angkatan,programstudi,kontribusi,pic_id) VALUES ('$nama','$jk','$semester','$angkatan','$programstudi','$kontribusi','$menu_id')";
		$this->db->query($query);
	}



	public function editDataBeastudi()
	{
		$data = [
			"nama_mh" => $this->input->post('nama_mh', true),
			"jk" => $this->input->post('jk', true),
			"semester" => $this->input->post('semester', true),
			"angkatan" => $this->input->post('angkatan', true),
			"programstudi" => $this->input->post('programstudi', true),
			"kontribusi" => $this->input->post('kontribusi', true),
			"menu_id" => $this->input->post('menu_id', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('beastudi', $data);
	}

	public function deleteDataBeastudiById($id)
	{
		$this->db->delete('beastudi', ['id' => $id]);
	}

	public function hitungJumlahBeastudi()
	{
		$query = $this->db->get('beastudi'); //beastudi /tabel
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function editdata($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
