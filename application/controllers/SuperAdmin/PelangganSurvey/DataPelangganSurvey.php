<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPelangganSurvey extends CI_Controller
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
        $data['DataPelangganSurvey'] = $this->SurveyPelanggan->DataPelangganSurveyNew();

        $this->load->view('SuperAdmin/Template/header', $data);
        $this->load->view('SuperAdmin/Template/sidebar', $data);
        $this->load->view('SuperAdmin/PelangganSurvey/dataPelangganSurvey', $data);
        $this->load->view('SuperAdmin/Template/footer', $data);
    }
    public function deleteData($id)
    {

        $where = array('id_customer' => $id);
        $this->DataPelanggan->deleteData($where, 'data_customer');
        $this->session->set_flashdata('pesan', '<div class="alert alert-susses alert-dismissible fade show" role="alert">
        
        <strong>Data Berhasil Dihapus</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('SuperAdmin/PelangganSurvey/DataPelangganSurvey');
    }
}
