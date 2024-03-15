<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class WaTidakTercover extends CI_Controller
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
        $data['Follow'] = $this->db->query("SELECT id_user, pembelian_paket, nama_user, alamat_user, tlp_user, tanggal, status FROM data_user WHERE id_user=$id")->Result();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/TidakTercover/waTidakTercover', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }

    public function followUpSales()
    {
        $id_user = $this->input->post('id_user');

        $data['Follow'] = $this->db->query("SELECT id_user, pembelian_paket, nama_user, alamat_user, tlp_user, tanggal, status FROM data_user WHERE id_user=$id_user")->Result();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $nama_user = $this->input->post('nama_user');
        $tlp_user = $this->input->post('tlp_user');
        $alamat_user = $this->input->post('alamat_user');
        $pembelian_paket = $this->input->post('pembelian_paket');
        $tlp_pegawai = $this->input->post('tlp_pegawai');

        $phone1 = preg_replace('/^\+?08/', '628', $tlp_pegawai);


        header("location:https://api.whatsapp.com/send?phone=$phone1&text=*INFLY NETWORKS* %0a%0a DATA PELANGGAN TIDAK TERCOVER %0a%0a Nama : $nama_user %0a Telepon : $tlp_user %0a Alamat : $alamat_user %0a Jenis Paket : $pembelian_paket %0a%0a Terima Kasih.  %0a%0a *INFLY NETWORKS*");

        echo "
            <script>
               window.location=history.go(-1);
            </script>
            ";
    }
}
