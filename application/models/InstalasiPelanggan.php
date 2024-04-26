<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class InstalasiPelanggan extends CI_Model
{

    //Menampilkan Data Baru
    public function DataPelangganInstalasiNew()
    {
        $query = $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal, status 
        FROM data_customer dc
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE dc.id_status='3'
        
        ORDER BY id_customer DESC
        ;");
        return $query->result_array();
    }

    public function JumlahInstalasiNew()
    {
        $query =
            $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal id_status FROM data_customer WHERE id_status='3';");

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
