<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function data_user($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_admin($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_calon_siswa($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function register($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function cekEmail($email)
    {
        return $this->db->table('user')->where([
            'email' => $email
        ])->get()->getRowArray();
    }

    public function byEmail($email)
    {
        return $this->db->table('user')
            ->where('email', $email)
            ->get()->getRowArray();
    }

    public function ubahStatusVerifikasi($data)
    {
        $this->db->table('user')->where('email', $data['email'])->update($data);
    }

    public function cekVerifikasi($username)
    {
        return $this->db->table('user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }
}
