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
        $data = array(
            'status' => 'Survey'
        );

        $where = array(
            'id_user' => $id
        );


        $this->DataPelanggan->updateData('data_user', $data, $where);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Data Pelanggan Sudah Diubah</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );

        redirect('Admin/PelangganBaru/DataPelangganBaru');
    }
}
