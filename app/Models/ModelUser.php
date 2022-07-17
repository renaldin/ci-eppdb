<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{

    public function dataUser()
    {
        return $this->db->table('user')
            ->orderBy('id_user', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_user)
    {
        return $this->db->table('user')
            ->where('id_user', $id_user)
            ->get()->getRowArray();
    }

    public function cekPassword($password_lama)
    {
        return $this->db->table('user')
            ->where('password', $password_lama)
            ->get()->getRowArray();
    }

    public function tambah($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->delete($data);
    }

    public function jumlahUser()
    {
        return $this->db->table('user')
            ->countAllResults();
    }
}
