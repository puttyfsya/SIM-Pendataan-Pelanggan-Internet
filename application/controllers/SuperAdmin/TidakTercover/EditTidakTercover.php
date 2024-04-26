<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditTidakTercover extends CI_Controller
{
    public function editData($id)
    {
        $data = array(
            'id_status' => '2'

        );

        $where = array(
            'id_customer' => $id
        );


        $this->DataPelanggan->updateData('data_customer', $data, $where);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Data Pelanggan Sudah Diubah</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );
        redirect('SuperAdmin/TidakTercover/DataTidakTercover');
    }
}

