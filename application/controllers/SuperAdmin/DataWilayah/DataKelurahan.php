<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKelurahan extends CI_Controller
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
        $data['DataKelurahan'] = $this->DataWilayah->DataKelurahan();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/DataWilayah/listKelurahan', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function deleteData($id)
    {
        $where = array('id_kelurahan' => $id);
        $this->DataWilayah->deleteData($where, 'data_kelurahan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-susses alert-dismissible fade show" role="alert">
        
        <strong>Data Berhasil Dihapus</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('SuperAdmin/DataWilayah/DataKelurahan');
    }

    public function TambahKelurahan()
    {
        $data['DataKelurahan'] = $this->DataWilayah->DataKelurahan();
        $data['DataKecamatan'] = $this->DataWilayah->DataKecamatan();

        $this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('SuperAdmin/Template/header', $data);
            $this->load->view('SuperAdmin/Template/sidebar', $data);
            $this->load->view('SuperAdmin/DataWilayah/tambahKelurahan', $data);
            $this->load->view('SuperAdmin/Template/footer', $data);
        } else {
            $nama_kelurahan = $this->input->post('nama_kelurahan');
            $id_kecamatan = $this->input->post('id_kecamatan');

            $data = array(
                'nama_kelurahan'       => $nama_kelurahan,
                'id_kecamatan'         => $id_kecamatan
            );

            $this->DataWilayah->insertData($data, 'data_kelurahan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>TAMBAH DATA BERHASIL</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            redirect('SuperAdmin/DataWilayah/DataKelurahan');
        }
    }
}
