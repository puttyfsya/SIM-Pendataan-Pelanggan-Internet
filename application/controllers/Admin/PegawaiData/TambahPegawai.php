<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahPegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('email') == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Lakukan Login Terlebih Dahulu</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
            redirect('Welcome');
        }
    }

    public function index()
    {
        $data['DataJabatan'] = $this->DataPegawai->DataJabatanPegawai();
        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/DaftarPegawai/tambahPegawai', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function TambahDataAksi()
    {
        $data['DataJabatan'] = $this->DataPegawai->DataJabatanPegawai();
        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $this->form_validation->set_rules('nama_pegawai', 'Nama', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'NIK', 'required');
        $this->form_validation->set_rules('tlp_pegawai', 'Telephone', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_message('required', 'Masukan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/Template/header', $data);
            $this->load->view('Admin/Template/sidebar', $data);
            $this->load->view('Admin/DaftarPegawai/tambahPegawai', $data);
            $this->load->view('Admin/Template/footer', $data);
        } else {
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $nik_pegawai        = $this->input->post('nik_pegawai');
            $tlp_pegawai        = $this->input->post('tlp_pegawai');
            $id_jabatan         = $this->input->post('id_jabatan');

            $data = array(
                'nama_pegawai'      => $nama_pegawai,
                'nik_pegawai'       => $nik_pegawai,
                'tlp_pegawai'       => $tlp_pegawai,
                'id_jabatan'        => $id_jabatan
            );

            $this->DataPegawai->insertData($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>TAMBAH DATA BERHASIL</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            redirect('Admin/PegawaiData/DataPegawaiInfly');
        }
    }
}
