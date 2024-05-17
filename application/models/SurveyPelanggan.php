<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SurveyPelanggan extends CI_Model
{

    //Menampilkan Data Baru
    public function DataPelangganSurveyNew()
    {
        $query = $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal, 
        nama_kelurahan, nama_kecamatan, nama_kota, status 
        
        FROM data_customer dc 
        JOIN data_status ds ON ds.id_status = dc.id_status
        JOIN data_kelurahan dt on dt.id_kelurahan = dc.id_kelurahan
        JOIN data_kecamatan dk on dk.id_kecamatan = dc.id_kecamatan
        JOIN data_kota da on da.id_kota = dc.id_kota

        WHERE dc.id_status=2
        
        ORDER BY id_customer ASC;");
        return $query->result_array();
    }

    public function JumlahSurveyNew()
    {
        $query =
            $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal, id_status FROM data_customer WHERE id_status='2';");

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
    public function EditDataPelanganNew($id)
    {
        $this->db->select('id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, tanggal');
        $this->db->where(
            'id_customer',
            $id
        );
        $result = $this->db->get('data_customer');

        return $result->row();
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}
