<?php

class DataPegawai extends CI_Model
{

    public function DataJabatanPegawai()
    {
        $query = $this->db->query("SELECT id_jabatan, nama_jabatan FROM data_jabatan");
        return $query->result_array();
    }

    //Menampilkan Data Baru
    public function DataPegawaiNew()
    {
        $query = $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nama_pegawai, 
        data_pegawai.nik_pegawai, data_pegawai.tlp_pegawai, data_pegawai.id_jabatan, data_jabatan.nama_jabatan 
        
        FROM data_pegawai
        
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan");
        return $query->result_array();
    }

    // Menambah Data Baru
    public function insertData($data, $table)
    {
        $this->db->insert(
            $table,
            $data
        );
    }

    //Mengedit Data Pegawai
    public function editPegawai($id)
    {
        $this->db->select('id_pegawai, nama_pegawai, nik_pegawai, tlp_pegawai, jabatan_pegawai');
        $this->db->where('id_pegawai', $id);
        $result = $this->db->get('data_pegawai');

        return $result->row();
    }

    //Menghapus Data Pegawai
    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Update Data
    public function updateData($table, $data, $where)
    {
        $this->db->update(
            $table,
            $data,
            $where
        );
    }
}
