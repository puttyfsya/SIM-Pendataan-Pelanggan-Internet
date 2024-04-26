<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardSuperAdmin extends CI_Controller
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
        //methode memanggil Model dan function
        $data['TotalPelanggan'] = $this->DataPelanggan->TotalPelangganNew();
        $data['JumlahPelangganBaru'] = $this->DataPelanggan->JumlahPelangganNew();
        $data['JumlahPelangganSurvey'] = $this->SurveyPelanggan->JumlahSurveyNew();
        $data['JumlahPelangganInstalasi'] = $this->InstalasiPelanggan->JumlahInstalasiNew();
        $data['JumlahTidakTercover'] = $this->TolakPelanggan->JumlahTidakTercoverNew();



        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/Dashboard/dashboard', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }
}
