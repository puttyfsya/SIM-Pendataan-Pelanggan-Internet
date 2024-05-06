<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditDataPelangganBaru extends CI_Controller
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

    public function editData($id)
    {
        $data['kota'] = $this->DataWilayah->DataKota();
        $data['kecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['kelurahan'] = $this->DataWilayah->DataKelurahan();
        $data['DataPelangganEdit'] = $this->db->query("SELECT dc.id_customer, dc.paket, dc.nama_customer, dc.nik_customer, dc.alamat_customer, dc.tlp_customer, dc.id_kelurahan, dc.id_kecamatan, dc.id_kota, dc.id_status, dc.tanggal, dc.nama_pegawai, ds.status
        FROM data_customer dc 
        JOIN data_kota dk ON dk.id_kota = dc.id_kota 
        JOIN data_kecamatan dkec ON dkec.id_kecamatan = dc.id_kecamatan 
        JOIN data_kelurahan dkel ON dkel.id_kelurahan = dc.id_kelurahan 
        JOIN data_status ds ON ds.id_status = dc.id_status 
        WHERE id_customer=$id")->result();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/PelangganBaru/editPelangganBaru', $data);
        $this->load->view('Admin/Template/footer', $data);
    }


    public function editDataAksi()
    {
        $id     = $this->input->post('id_customer');

        $data['DataPelangganBaru'] = $this->db->query("SELECT dc.id_customer, dc.paket, dc.nama_customer, dc.nik_customer, dc.alamat_customer, dc.tlp_customer, dc.id_kelurahan, dc.id_kecamatan, dc.id_kota, dc.id_status, dc.tanggal, dc.nama_pegawai
        FROM data_customer dc 
        JOIN data_kota dk ON dk.id_kota = dc.id_kota 
        JOIN data_kecamatan dkec ON dkec.id_kecamatan = dc.id_kecamatan 
        JOIN data_kelurahan dkel ON dkel.id_kelurahan = dc.id_kelurahan 
        JOIN data_status ds ON ds.id_status = dc.id_status 
        WHERE id_customer=$id")->result();

        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('nama_customer', 'Nama', 'required');
        $this->form_validation->set_rules('nik_customer', 'NIK', 'required');
        $this->form_validation->set_rules('tlp_customer', 'Telephone', 'required');
        $this->form_validation->set_rules('alamat_customer', 'Alamat', 'required');
        $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required');
        $this->form_validation->set_rules('tanggal-column', 'Tanggal', 'required');

        $this->form_validation->set_message('required', 'Masukkan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/Template/header');
            $this->load->view('Admin/Template/sidebar');
            $this->load->view('Admin/PelangganBaru/editPelangganBaru');
            $this->load->view('Admin/Template/footer');
        } else {
            $tanggal_baru = $this->input->post('tanggal-column');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_kelurahan = $this->input->post('id_kelurahan');
            $id_kota = $this->input->post('id_kota');

            $data = array(
                'paket'             => $this->input->post('paket'),
                'nama_customer'     => $this->input->post('nama_customer'),
                'nik_customer'      => $this->input->post('nik_customer'),
                'tlp_customer'      => $this->input->post('tlp_customer'),
                'alamat_customer'   => $this->input->post('alamat_customer'),
                'id_kelurahan'      => $id_kelurahan,
                'id_kecamatan'      => $id_kecamatan,
                'id_kota'           => $id_kota,
                'id_status'         => 1,
                'tanggal'           => $tanggal_baru,
                'nama_pegawai'      => 'Eka',
            );
            $where = array(
                'id_customer'              => $id
            );

            $this->DataPelanggan->updateData('data_customer', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>UPDATE DATA BERHASIL</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Admin/PelangganBaru/DataPelangganBaru');
        }
    }
}
