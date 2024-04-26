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
        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();
        $data['DataWilayah'] = $this->DataWilayah->DataKelurahan();
        $data['DataKota'] = $this->DataWilayah->DataKota();
        $data['DataKecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['DataPelangganBaru'] = $this->DataPelanggan->DataPelangganNew();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/PelangganBaru/tambahPelangganBaru', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function get_kecamatan_by_kota()
    {
        $id_kota = $this->input->post('id_kota');
        $data = $this->DataWilayah->get_kecamatan_by_kota($id_kota);
        echo json_encode($data);
    }

    public function get_kelurahan_by_kecamatan()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');
        $data = $this->DataWilayah->get_kelurahan_by_kecamatan($id_kecamatan);
        echo json_encode($data);
    }

    public function TambahDataAksi()
    {
        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();
        // $data['DataKelurahan'] = $this->DataWilayah->DataKelurahan();
        $data['DataPelangganBaru'] = $this->DataPelanggan->DataPelangganNew();

        $this->form_validation->set_rules('nama_customer', 'Nama', 'required');
        $this->form_validation->set_rules('nik_customer', 'NIK', 'required');
        $this->form_validation->set_rules('tlp_customer', 'Telephone', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('alamat_customer', 'Alamat', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required');
        $this->form_validation->set_message('required', 'Masukan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/Template/header', $data);
            $this->load->view('Admin/Template/sidebar', $data);
            $this->load->view('Admin/PelangganBaru/tambahPelangganBaru', $data);
            $this->load->view('Admin/Template/footer', $data);
        } else {
            $nama_customer       = $this->input->post('nama_customer');
            $nik_customer        = $this->input->post('nik_customer');
            $tlp_customer        = $this->input->post('tlp_customer');
            $paket               = $this->input->post('paket');
            $alamat_customer     = $this->input->post('alamat_customer');
            $nama_pegawai        = $this->input->post('nama_pegawai');
            $id_kelurahan        = $this->input->post('id_kelurahan');
            $id_kecamatan        = $this->input->post('id_kecamatan');
            $id_kota             = $this->input->post('id_kota');
            
            $data = array(
                'nama_customer'      => $nama_customer,
                'nik_customer'       => $nik_customer,
                'tlp_customer'       => $tlp_customer,
                'paket'              => $paket,
                'alamat_customer'    => $alamat_customer,
                'nama_pegawai'       => $nama_pegawai,
                'id_kelurahan'      => $id_kelurahan,
                'id_kecamatan'      => $id_kecamatan,
                'id_kota'           => $id_kota,
                'id_status'           => 1,
            );
            // return var_dump($data);
            $this->DataPelanggan->insertData($data, 'data_customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>TAMBAH DATA BERHASIL</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            redirect('Admin/PelangganBaru/DataPelangganBaru');
        }
    }
}
