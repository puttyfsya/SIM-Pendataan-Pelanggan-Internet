<?php
class DataWilayah extends CI_Model
{
    public function DataKelurahan()
    {
        $query = $this->db->query("SELECT data_kelurahan.id_kelurahan, data_kelurahan.nama_kelurahan, data_kelurahan.id_kecamatan, data_kecamatan.nama_kecamatan 
        FROM data_kelurahan
        INNER JOIN data_kecamatan ON data_kelurahan.id_kecamatan = data_kecamatan.id_kecamatan
        ");
        return $query->result_array();
    }

    // public function DataKota(){
    //     $query = $this->db->query("SELECT data_kota.id_kota, data_kota.nama_kota FROM data_kota
    //     INNER J");
    // }
}
