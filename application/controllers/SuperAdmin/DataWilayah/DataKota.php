<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKota extends CI_Controller
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
        $data['DataKota'] = $this->DataWilayah->DataKota();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/DataWilayah/listKota', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function deleteData($id)
    {
        $where = array('id_kota' => $id);
        $this->DataWilayah->deleteData($where, 'data_kota');
        $this->session->set_flashdata('pesan', '<div class="alert alert-susses alert-dismissible fade show" role="alert">
        
        <strong>Data Berhasil Dihapus</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('SuperAdmin/DataWilayah/DataKota');
    }

    public function TambahKota()
    {
        $data['DataKota'] = $this->DataWilayah->DataKota();
        $this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('SuperAdmin/Template/header', $data);
            $this->load->view('SuperAdmin/Template/sidebar', $data);
            $this->load->view('SuperAdmin/DataWilayah/tambahKota', $data);
            $this->load->view('SuperAdmin/Template/footer', $data);
        } else {
            $nama_kota = $this->input->post('nama_kota');

            $data = array(
                'nama_kota'  => $nama_kota
            );

            $this->DataWilayah->insertData($data, 'data_kota');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>TAMBAH DATA BERHASIL</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            redirect('SuperAdmin/DataWilayah/DataKota');
        }
    }
}
