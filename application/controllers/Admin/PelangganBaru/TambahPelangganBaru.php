<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahPelangganBaru extends CI_Controller
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
        $data['kota'] = $this->DataWilayah->DataKota();
        $data['kecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['kelurahan'] = $this->DataWilayah->DataKelurahan();
        $data['pelanggan'] = $this->DataPelanggan->DataPelangganNew();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/PelangganBaru/tambahPelangganBaru', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function TambahDataAksi()
    {

        $data['kota'] = $this->DataWilayah->DataKota();
        $data['kecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['kelurahan'] = $this->DataWilayah->DataKelurahan();
        $data['pelanggan'] = $this->DataPelanggan->DataPelangganNew();

        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('nama_customer', 'Nama', 'required');
        $this->form_validation->set_rules('nik_customer', 'NIK', 'required');
        $this->form_validation->set_rules('tlp_customer', 'Telephone', 'required');
        $this->form_validation->set_rules('alamat_customer', 'Alamat', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');

        $this->form_validation->set_message('required', 'Masukkan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/Template/header', $data);
            $this->load->view('Admin/Template/sidebar', $data);
            $this->load->view('Admin/PelangganBaru/tambahPelangganBaru', $data);
            $this->load->view('Admin/Template/footer', $data);
        } else {
            $tanggal_sekarang = date('Y-m-d');
            $id_kecamatan = $this->input->post('kecamatan');
            $id_kelurahan = $this->input->post('kelurahan');
            $id_kota = $this->input->post('kota');


            $data = array(
                'paket' => $this->input->post('paket'),
                'nama_customer' => $this->input->post('nama_customer'),
                'nik_customer' => $this->input->post('nik_customer'),
                'tlp_customer' => $this->input->post('tlp_customer'),
                'alamat_customer' => $this->input->post('alamat_customer'),
                'id_kelurahan' => $id_kelurahan,
                'id_kecamatan' => $id_kecamatan,
                'id_kota' => $id_kota,
                'id_status' => 1,
                'tanggal' => $tanggal_sekarang,
                'nama_pegawai' => 'Eka'
            );

            $this->DataPelanggan->insertData($data, 'data_customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>TAMBAH DATA BERHASIL</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/PelangganBaru/DataPelangganBaru');
        }
    }
}
