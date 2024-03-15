<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EditPegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Login terlebih dahulu</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
            redirect('Welcome');
        }
    }

    public function index()
    {
        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();
        $data['DataJabatan'] = $this->DataPegawai->DataJabatanPegawai();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/DaftarPegawai/editPegawai', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function editData($id)
    {
        $data['DataJabatan'] = $this->DataPegawai->DataJabatanPegawai();
        $data['DataPegawai']  =  $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nik_pegawai, data_pegawai.nama_pegawai, data_pegawai.tlp_pegawai, data_pegawai.id_jabatan, data_jabatan.nama_jabatan
            FROM data_pegawai
            INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan
            WHERE id_pegawai  = '$id'")->result();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/DaftarPegawai/editPegawai', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function editDataAksi()
    {
        $id                     = $this->input->post('id_pegawai');

        $data['DataPegawai']  =  $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nik_pegawai, data_pegawai.nama_pegawai, data_pegawai.tlp_pegawai, data_pegawai.id_jabatan, data_jabatan.nama_jabatan
            FROM data_pegawai
            INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan
            WHERE id_pegawai  = '$id'")->result();

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('nik_pegawai', 'NIK', 'required');
        $this->form_validation->set_rules('tlp_pegawai', 'Telephone', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_message('required', 'Masukan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('SuperAdmin/Template/header');
            $this->load->view('SuperAdmin/Template/sidebar');
            $this->load->view('SuperAdmin/DaftarPegawai/editPegawai');
            $this->load->view('SuperAdmin/Template/footer');
        } else {
            $nama_pegawai           = $this->input->post('nama_pegawai');
            $nik_pegawai            = $this->input->post('nik_pegawai');
            $tlp_pegawai            = $this->input->post('tlp_pegawai');
            $id_jabatan             = $this->input->post('id_jabatan');

            $data = array(
                'nama_pegawai'          => $nama_pegawai,
                'nik_pegawai'           => $nik_pegawai,
                'tlp_pegawai'           => $tlp_pegawai,
                'id_jabatan'            => $id_jabatan
            );
            $where = array(
                'id_pegawai'              => $id
            );

            $this->DataPegawai->updateData('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>UPDATE DATA BERHASIL</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            redirect('SuperAdmin/PegawaiData/DataPegawaiInfly');
        }
    }
}
