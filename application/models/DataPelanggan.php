<?php

class DataPelanggan extends CI_Model
{


    public function DataPelangganNew()
    {
        $query = $this->db->query("SELECT data_customer.id_customer, data_customer.paket, data_customer.nama_customer, data_customer.nik_customer, data_customer.tlp_customer, data_customer.alamat_customer,
          data_customer.id_kelurahan, data_customer.id_kecamatan, data_customer.id_kota, data_customer.id_status, data_customer.tanggal, data_customer.nama_pegawai
        FROM data_customer 
        INNER JOIN data_kelurahan  ON data_customer.id_kelurahan = data_kelurahan.id_kelurahan
        INNER JOIN data_kecamatan  ON data_customer.id_kecamatan = data_kecamatan.id_kecamatan
        INNER JOIN data_kota  ON data_customer.id_kota = data_kota.id_kota
        INNER JOIN data_status  ON data_customer.id_status = data_status.id_status
        WHERE data_customer.id_status=1
        ORDER BY id_customer DESC;");
        return $query->result_array();
    }
    public function DataPelangganNew2()
    {
        $query = $this->db->query("SELECT data_customer.id_customer, data_customer.paket, data_customer.nama_customer, data_customer.nik_customer, data_customer.tlp_customer, data_customer.alamat_customer,
        data_customer.id_kelurahan, data_customer.id_kecamatan, data_customer.id_kota, data_customer.id_status, data_customer.tanggal, data_customer.nama_pegawai
        FROM data_customer 
        INNER JOIN data_kelurahan  ON data_customer.id_kelurahan = data_kelurahan.id_kelurahan
        INNER JOIN data_kecamatan  ON data_customer.id_kecamatan = data_kecamatan.id_kecamatan
        INNER JOIN data_kota  ON data_customer.id_kota = data_kota.id_kota
        INNER JOIN data_status  ON data_customer.id_status = data_status.id_status
        WHERE data_customer.id_status=1
        ORDER BY id_customer DESC;");
        return $query->result_array();
    }

    public function getStatusNameById($id_status)
    {
        $query = $this->db->get_where('data_status', array('id_status' => $id_status));
        $result = $query->row();
        return isset($result) ? $result->status : 'Tidak Diketahui';
    }


    public function TotalPelangganNew()
    {
        $query =
            $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, id_kelurahan, id_kecamatan, id_kota, id_status FROM data_customer");

        return $query->num_rows();
    }

    public function JumlahPelangganNew()
    {
        $query =
            $this->db->query("SELECT id_customer, paket, nama_customer, nik_customer, alamat_customer, tlp_customer, id_kelurahan, id_kecamatan, id_kota, tanggal, id_status 
            FROM data_customer 
            WHERE id_status='1';");

        return $query->num_rows();
    }

    public function EditDataPelanganNew($id)
    {
        $this->db->select('id_customer, paket, nama_customer, nik_customer, tlp_customer, alamat_customer, id_kelurahan, id_kecamatan, id_kota, tanggal');
        $this->db->where('id_customer', $id);
        $result = $this->db->get('data_customer');

        return $result->row();
    }

    public function insertData($data, $table)
    {
        $this->db->insert($table, $data);
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
