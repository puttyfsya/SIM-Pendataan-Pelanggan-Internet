<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TolakPelanggan extends CI_Model
{
    //Menampilkan Data Baru
    public function DataTidakTercoverNew()
    {
        $query = $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal, id_status 
        FROM data_customer WHERE id_status='4'
        
        ORDER BY id_customer DESC;");
        return $query->result_array();
    }

    public function JumlahTidakTercoverNew()
    {
        $query =
            $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal id_status FROM data_customer WHERE id_status='4';");

        return $query->num_rows();
    }

    public function deleteData($id)
    {
        // var_dump($id);
        // die;

        $idUser = $id['id_customer'];
        $query =
            $this->db->query("DELETE FROM data_customer WHERE id_customer='$idUser'");
        // var_dump($query);
        // die;
        return $query;
    }
}
