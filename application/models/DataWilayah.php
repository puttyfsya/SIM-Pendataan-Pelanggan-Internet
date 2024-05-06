<?php
class DataWilayah extends CI_Model
{
    public function DataKota()
    {
        $query = $this->db->query("SELECT id_kota , nama_kota FROM data_kota");
        return $query->result_array();
    }
    public function DataKecamatan()
    {
        $query = $this->db->query("SELECT data_kecamatan.id_kecamatan, data_kecamatan.nama_kecamatan, data_kecamatan.id_kota, data_kota.nama_kota 
        FROM data_kecamatan
        INNER JOIN data_kota ON data_kecamatan.id_kota = data_kota.id_kota");
        return $query->result_array();
    }
    public function DataKelurahan()
    {
        $query = $this->db->query("SELECT data_kelurahan.id_kelurahan, data_kelurahan.nama_kelurahan, data_kelurahan.id_kecamatan, data_kecamatan.nama_kecamatan 
        FROM data_kelurahan
        INNER JOIN data_kecamatan ON data_kelurahan.id_kecamatan = data_kecamatan.id_kecamatan
        INNER JOIN data_kota ON data_kecamatan.id_kota = data_kota.id_kota");
        return $query->result_array();
    }


    public function insertData($data, $table)
    {
        $this->db->insert(
            $table,
            $data
        );
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
