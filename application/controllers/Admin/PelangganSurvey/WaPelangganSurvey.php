<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class WaPelangganSurvey extends CI_Controller
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

    public function followUpAksi($id)
    {
        $data['Follow'] = $this->db->query("SELECT id_customer, paket, nama_customer, alamat_customer, tlp_customer, tanggal, status 
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE id_customer=$id")->Result();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/PelangganSurvey/waPelangganSurvey', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function followUpSales()
    {
        $id_customer = $this->input->post('id_customer');

        $data['Follow'] = $this->db->query("SELECT id_customer, paket, nama_customer, alamat_customer, tlp_customer, tanggal, status 
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE id_customer=$id_customer")->Result();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $nama_customer = $this->input->post('nama_customer');
        $tlp_customer = $this->input->post('tlp_customer');
        $alamat_customer = $this->input->post('alamat_customer');
        $paket = $this->input->post('paket');
        $tlp_pegawai = $this->input->post('tlp_pegawai');

        $phone1 = preg_replace('/^\+?08/', '628', $tlp_pegawai);


        header("location:https://api.whatsapp.com/send?phone=$phone1&text=*INFLY NETWORKS* %0a%0a DATA PELANGGAN TIDAK TERCOVER %0a%0a Nama : $nama_customer %0a Telepon : $tlp_customer %0a Alamat : $alamat_customer %0a Jenis Paket : $paket %0a%0a Terima Kasih.  %0a%0a *INFLY NETWORKS*");

        echo "
            <script>
               window.location=history.go(-1);
            </script>
            ";
    }
}
