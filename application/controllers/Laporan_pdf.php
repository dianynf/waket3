<?php
class Laporan_pdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //untuk memanggil model
        $this->load->model('pdf');
        $this->load->helper('url');
    }

    public function index()
    {
        //meload fungsi yang ada pada model
        $data['Mahasiswa'] = $this->pdf->tampil_data()->result();
        $this->load->view('laporan_pdf', $data);
    }

    public function laporan_pdf()
    {
        $this->load->library('pdfgenerator');
        $data['Mahasiswa'] = $this->pdf->tampil_data()->result();
        //menampilkan data dalam bentuk pdf yang akan dicetak
        $html = $this->load->view('cetak_pdf', $data, true);
        $this->pdfgenerator->generate($html);
    }
}
