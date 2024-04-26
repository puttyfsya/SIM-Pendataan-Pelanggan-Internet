<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataWALunas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Login terlebih dahulu</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
            redirect('Welcome');
        }
    }

    public function index()
    {
        if ((isset($_GET['bulan'])) && (isset($_GET['tahun']))) {
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];

            $this->session->set_userdata('bulan', $bulan);
            $this->session->set_userdata('tahun', $bulan);
        } else {
            $bulan  = date('m');
            $tahun  = date('Y');
        }

        $data['mikrotik'] = $this->ClientModel->index();
        $data['customer'] = $this->ClientModel->getDataClient($bulan, $tahun);
        $data['belumBayar'] = $this->ClientModel->hitungPembayaranBelum($bulan, $tahun);
        $data['sudahBayar'] = $this->ClientModel->hitungPembayaranSudah($bulan, $tahun);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebarAdmin', $data);
        $this->load->view('admin/DataPelanggan/editPelanggan', $data);
        $this->load->view('template/footer', $data);
    }

    public function waTagih($id)
    {
        if ((isset($_GET['bulan'])) && (isset($_GET['tahun']))) {
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];

            $this->session->set_userdata('bulan', $bulan);
            $this->session->set_userdata('tahun', $bulan);
        } else {
            $bulan  = date('m');
            $tahun  = date('Y');
        }

        $data['customer']  =  $this->db->query("SELECT 
            client.id, client.code_client, client.phone, client.latitude, client.longitude,
            client.name, client.id_paket, client.name_pppoe, client.password_pppoe, client.id_pppoe, client.address,
            client.email, client.start_date, client.stop_date, client.id_area, client.description,
            client.id_sales, client.created_at, client.updated_at,
            paket.name AS namaPaket, paket.price AS hargaPaket, paket.description AS descriptionPaket
            
            FROM client 
            LEFT OUTER JOIN paket ON client.id_paket = paket.id

            WHERE client.id  = '$id'")->result();

        $data['paket'] = $this->ClientModel->dataPaket();
        $data['area'] = $this->ClientModel->dataArea();
        $data['sales'] = $this->ClientModel->dataSales();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebarAdmin', $data);
        $this->load->view('admin/DataPelanggan/dataWALunas', $data);
        $this->load->view('template/footer', $data);
    }

    public function waDataAksi()
    {
        $id                = $this->input->post('id');
        $data['customer']  =  $this->db->query("SELECT 
            client.id, client.code_client, client.phone, client.latitude, client.longitude,
            client.name, client.id_paket, client.name_pppoe, client.password_pppoe, client.id_pppoe, client.address,
            client.email, client.start_date, client.stop_date, client.id_area, client.description,
            client.id_sales, client.created_at, client.updated_at,
            paket.name AS namaPaket, paket.price AS hargaPaket, paket.description AS descriptionPaket
            
            FROM client 
            LEFT OUTER JOIN paket ON client.id_paket = paket.id

            WHERE client.id  = '$id'")->result();

        $data['paket'] = $this->ClientModel->dataPaket();
        $data['area'] = $this->ClientModel->dataArea();
        $data['sales'] = $this->ClientModel->dataSales();

        $id               = $this->input->post('id');
        $phone            = $this->input->post('phone');
        $name             = $this->input->post('name');
        $namaPaket        = $this->input->post('namaPaket');
        $hargaPaket       = $this->input->post('hargaPaket');
        $ppn              = $this->input->post('ppn');
        $total            = $this->input->post('total');
        $tagihan          = $this->input->post('tagihan');

        $phone1 = preg_replace('/^\+?08/', '628', $phone);
        $total1 = number_format($total, 0, ',', '.');

        header("location:https://api.whatsapp.com/send?phone=$phone1&text=*INFLY NETWORKS* %0a%0a Yth Bapak / Ibu %0a Nama : $name %0a Telepon : $phone %0a%0a *PEMBAYARAN* %0a Tagihan Bulan : $tagihan %0a Jenis Paket : $namaPaket %0a Harga Paket : $hargaPaket %0a Total : $hargaPaket (Sudah Termasuk PPN) %0a Keterangan : *Lunas* %0a%0a *Informasi Tambahan* %0a Simpan struk ini sebagai bukti telah melakukan pembayaran. %0a%0a Jika ada pertanyaan lebih lanjut, anda dapat langsung membalas pesan ini. %0a%0a Terima Kasih. %0a Hormat Kami. %0a%0a *INFLY NETWORKS*
            ");

        echo "
            <script>
               window.location=history.go(-1);
            </script>
            ";
    }
}
