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
        $data['DataPelangganBaru'] = $this->DataPelanggan->DataPelangganNew();
        $data['DataPelangganEdit'] = $this->db->query("SELECT id_customer, paket, nama_customer, alamat_customer, tlp_customer, tanggal, status 
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE id_customer=$id")->Result();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/PelangganBaru/editPelangganBaru', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function editDataAksi()
    {
        $id     = $this->input->post('id_customer');
        $data['DataPelangganEdit'] = $this->db->query("SELECT id_customer, paket, nama_customer, alamat_customer, tlp_customer, tanggal, status 
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE id_customer=$id")->Result();

        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('tlp_customer', 'Telephone', 'required');
        $this->form_validation->set_rules('alamat_customer', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_message('required', 'Masukan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/Template/header');
            $this->load->view('Admin/Template/sidebar');
            $this->load->view('Admin/PelangganBaru/editPelangganBaru');
            $this->load->view('Admin/Template/footer');
        } else {
            $nama_customer              = $this->input->post('nama_customer');
            $paket                      = $this->input->post('paket');
            $tlp_customer               = $this->input->post('tlp_customer');
            $alamat_customer            = $this->input->post('alamat_customer');
            $tanggal                    = $this->input->post('tanggal');

            $data = array(
                'nama_customer'          => $nama_customer,
                'paket'                  => $paket,
                'tlp_customer'           => $tlp_customer,
                'alamat_customer'        => $alamat_customer,
                'tanggal'                => $tanggal
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