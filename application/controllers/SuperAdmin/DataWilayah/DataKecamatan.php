<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKecamatan extends CI_Controller
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
        $data['DataKecamatan'] = $this->DataWilayah->DataKecamatan();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/DataWilayah/listKecamatan', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function deleteData($id)
    {
        $where = array('id_kecamatan' => $id);
        $this->DataWilayah->deleteData($where, 'data_kecamatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-susses alert-dismissible fade show" role="alert">
        
        <strong>Data Berhasil Dihapus</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('SuperAdmin/DataWilayah/DataKecamatan');
    }

    public function TambahKecamatan()
    {
        $data['DataKecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['DataKota'] = $this->DataWilayah->DataKota();

        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('SuperAdmin/Template/header', $data);
            $this->load->view('SuperAdmin/Template/sidebar', $data);
            $this->load->view('SuperAdmin/DataWilayah/tambahKecamatan', $data);
            $this->load->view('SuperAdmin/Template/footer', $data);
        } else {
            $nama_kecamatan = $this->input->post('nama_kecamatan');
            $id_kota = $this->input->post('id_kota');

            $data = array(
                'nama_kecamatan'  => $nama_kecamatan,
                'id_kota'         => $id_kota
            );

            $this->DataWilayah->insertData($data, 'data_kecamatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>TAMBAH DATA BERHASIL</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            redirect('SuperAdmin/DataWilayah/DataKecamatan');
        }
    }
}
