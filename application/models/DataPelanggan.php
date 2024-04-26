<?php

class DataPelanggan extends CI_Model
{

    //Menampilkan Data Baru
    public function DataPelangganNew()
    {
        $query = $this->db->query("SELECT id_customer,paket, status, nama_customer, nik_customer, alamat_customer, tlp_customer	, nama_kelurahan, nama_kecamatan, nama_kota, tanggal
        FROM data_customer dc
        JOIN data_kelurahan dk ON dk.id_kelurahan = dc.id_kelurahan
        JOIN data_kecamatan dkc ON dkc.id_kecamatan = dc.id_kecamatan
        JOIN data_kota dkt ON dkt.id_kota = dc.id_kota
        JOIN data_status ds ON ds.id_status = dc.id_status
        WHERE dc.id_status=1
        
        ORDER BY id_customer DESC;");
        return $query->result_array();
    }

    public function TotalPelangganNew()
    {
        $query =
            $this->db->query("SELECT id_customer,paket, nama_customer, nik_customer, alamat_customer, tlp_customer	, id_kelurahan, id_kecamatan, id_kota, tanggal, 
            id_status FROM data_customer");

        return $query->num_rows();
    }

    public function JumlahPelangganNew()
    {
        $query =
            $this->db->query("SELECT id_customer,paket, nama_customer, nik_customer, alamat_customer, tlp_customer	, id_kelurahan, id_kecamatan, id_kota, tanggal, 
            id_status 
            FROM data_customer 
            WHERE id_status='1';");

        return $query->num_rows();
    }

    public function EditDataPelanganNew($id)
    {
        $this->db->select('id_customer, paket, nama_customer, nik_customer, tlp_customer, alamat_customer,  tanggal');
        $this->db->where('id_customer', $id);
        $result = $this->db->get('data_customer');

        return $result->row();
    }

    // Menambah Data Baru
    public function insertData($data, $table)
    {
        $this->db->insert(
            $table,
            $data
        );
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
