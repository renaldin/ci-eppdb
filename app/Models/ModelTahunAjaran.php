<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAjaran extends Model
{

    public function dataTahunAjaran()
    {
        return $this->db->table('tahun_ajaran')
            ->orderBy('tanggal_mulai', 'DESC')
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tahun_ajaran')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tahun_ajaran')->where('id_tahun_ajaran', $data['id_tahun_ajaran'])->update($data);
    }

    public function tahunAjaranAktif()
    {
        return $this->db->table('tahun_ajaran')
            ->where('status', 1)
            ->get()->getRowArray();
    }

    public function reset_status()
    {
        $this->db->table('tahun_ajaran')
            ->update(['status' => 0]);
    }

    public function hapus($data)
    {
        $this->db->table('tahun_ajaran')->where('id_tahun_ajaran', $data['id_tahun_ajaran'])->delete($data);
    }

    public function jumlahTahunAjaran()
    {
        return $this->db->table('tahun_ajaran')
            ->countAllResults();
    }
}
