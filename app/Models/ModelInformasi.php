<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInformasi extends Model
{

    protected $table = "informasi_ppdb";

    public function dataInformasi()
    {
        return $this->db->table('informasi_ppdb')
            ->orderBy('tanggal_informasi', 'DESC')
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('informasi_ppdb')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('informasi_ppdb')->where('id_informasi', $data['id_informasi'])->update($data);
    }

    public function detailDataInformasi($id_informasi)
    {
        return $this->db->table('informasi_ppdb')
            ->where('id_informasi', $id_informasi)
            ->get()->getRowArray();
    }

    public function hapusDataInformasi($data)
    {
        $this->db->table('informasi_ppdb')->where('id_informasi', $data['id_informasi'])->delete($data);
    }

    public function jumlahInformasi()
    {
        return $this->db->table('informasi_ppdb')
            ->countAllResults();
    }
}
