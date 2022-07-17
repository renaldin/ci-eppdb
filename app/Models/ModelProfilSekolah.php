<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProfilSekolah extends Model
{

    public function dataProfilSekolah($id_profil_sekolah)
    {
        return $this->db->table('profil_sekolah')
            ->where('id_profil_sekolah', $id_profil_sekolah)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('profil_sekolah')->where('id_profil_sekolah', $data['id_profil_sekolah'])->update($data);
    }
}
