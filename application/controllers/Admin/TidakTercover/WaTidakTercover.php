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
        $data['Follow'] = $this->db->query("SELECT dc.id_customer, dc.paket, dc.nama_customer, dc.nik_customer, dc.alamat_customer, dc.tlp_customer, dc.tanggal, ds.status , dc.id_kota, dc.id_kecamatan, dc.id_kelurahan
        FROM data_customer dc
        JOIN data_kota dk ON dk.id_kota = dc.id_kota 
        JOIN data_kecamatan dkec ON dkec.id_kecamatan = dc.id_kecamatan 
        JOIN data_kelurahan dkel ON dkel.id_kelurahan = dc.id_kelurahan 
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE id_customer=$id")->Result();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();
        $data['kota'] = $this->DataWilayah->DataKota();
        $data['kecamatan'] = $this->DataWilayah->DataKecamatan();
        $data['kelurahan'] = $this->DataWilayah->DataKelurahan();

        $this->load->view('Admin/Template/header', $data);
        $this->load->view('Admin/Template/sidebar', $data);
        $this->load->view('Admin/TidakTercover/waTidakTercover', $data);
        $this->load->view('Admin/Template/footer', $data);
    }

    public function followUpSales()
    {
        $id_customer = $this->input->post('id_customer');

        $follow = $this->db->query("SELECT dc.id_customer, dc.paket, dc.nama_customer, dc.nik_customer, dc.alamat_customer, dc.tlp_customer, dc.tanggal, ds.status, dk.nama_kota, dkec.nama_kecamatan, dkel.nama_kelurahan
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        JOIN data_kota dk ON dk.id_kota = dc.id_kota
        JOIN data_kecamatan dkec ON dkec.id_kecamatan = dc.id_kecamatan
        JOIN data_kelurahan dkel ON dkel.id_kelurahan = dc.id_kelurahan
        WHERE dc.id_customer=$id_customer")->row();

        $data['DataPegawai'] = $this->DataPegawai->DataPegawaiNew();

        $nama_customer = urlencode($follow->nama_customer);
        $nik_customer = urlencode($follow->nik_customer);
        $tlp_customer = urlencode($follow->tlp_customer);
        $alamat_customer = urlencode($follow->alamat_customer);
        $paket = urlencode($follow->paket);
        $nama_kota = urlencode($follow->nama_kota);
        $nama_kecamatan = urlencode($follow->nama_kecamatan);
        $nama_kelurahan = urlencode($follow->nama_kelurahan);
        $tlp_pegawai = $this->input->post('tlp_pegawai');

        // Mapping paket
        $paket_descriptions = [
            '1' => 'Home 10 Mbps - 160.000',
            '2' => 'Home 20 Mbps - 200.000',
            '3' => 'Home 30 Mbps - 250.000',
            '4' => 'Home 50 Mbps - 320.000',
            '5' => 'Home 100 Mbps - 499.000'
        ];

        $paket_description = isset($paket_descriptions[$paket]) ? $paket_descriptions[$paket] : 'Unknown Package';

        $phone1 = preg_replace('/^\+?08/', '628', $tlp_pegawai);

        $message = "*INFLY NETWORKS* %0a%0a";
        $message .= "DATA PELANGGAN TIDAK TERCOVER %0a%0a";
        $message .= "Nama: $nama_customer %0a";
        $message .= "NIK: $nik_customer %0a";
        $message .= "Telepon: $tlp_customer %0a";
        $message .= "Alamat: $alamat_customer %0a";
        $message .= "Kota: $nama_kota %0a";
        $message .= "Kecamatan: $nama_kecamatan %0a";
        $message .= "Kelurahan: $nama_kelurahan %0a";
        $message .= "Jenis Paket: $paket_description %0a%0a";  // Use description instead of numeric value
        $message .= "Terima Kasih. %0a%0a";
        $message .= "*INFLY NETWORKS*";

        header("location:https://api.whatsapp.com/send?phone=$phone1&text=$message");

        echo "
            <script>
               window.location=history.go(-1);
            </script>
            ";
    }
}
