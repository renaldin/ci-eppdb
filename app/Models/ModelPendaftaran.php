<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendaftaran extends Model
{

    public function dataPendaftaran()
    {
        return $this->db->table('pendaftaran')
            ->orderBy('tanggal_daftar', 'DESC')
            ->get()->getResultArray();
    }

    public function detail($id_pendaftaran)
    {
        return $this->db->table('pendaftaran')
            ->join('user', 'user.id_user = pendaftaran.id_user', 'left')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get()->getRowArray();
    }

    public function perUser($id_user)
    {
        return $this->db->table('pendaftaran')
            ->join('user', 'user.id_user = pendaftaran.id_user', 'left')
            ->where('pendaftaran.id_user', $id_user)
            ->get()->getRowArray();
    }

    public function lulus($data)
    {
        $this->db->table('pendaftaran')->where('id_pendaftaran', $data['id_pendaftaran'])->update($data);
    }

    public function pendaftaranLulus()
    {
        return $this->db->table('pendaftaran')
            ->where('status', 'Lulus')
            ->get()->getResultArray();
    }

    public function pendaftaranTidakLulus()
    {
        return $this->db->table('pendaftaran')
            ->where('status', 'Tidak Lulus')
            ->get()->getResultArray();
    }

    public function jumlahPendaftaran()
    {
        return $this->db->table('pendaftaran')
            ->countAllResults();
    }

    public function jumlahPendaftaranLulus()
    {
        return $this->db->table('pendaftaran')
            ->where('status', 'Lulus')
            ->countAllResults();
    }

    public function jumlahPendaftaranTidakLulus()
    {
        return $this->db->table('pendaftaran')
            ->where('status', 'Tidak Lulus')
            ->countAllResults();
    }

    public function jumlahPendaftaranBelumSeleksi()
    {
        return $this->db->table('pendaftaran')
            ->where('status', 'Belum Diseleksi')
            ->countAllResults();
    }

    public function tambah($data)
    {
        $this->db->table('pendaftaran')->insert($data);
    }

    public function pendaftaranUser($id_user)
    {
        return $this->db->table('pendaftaran')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    public function kodePendaftaranTerakhir()
    {
        return $this->db->table('pendaftaran')
            ->limit(1)
            ->orderBy('id_pendaftaran', 'DESC')
            ->get()->getRow();
    }
}
