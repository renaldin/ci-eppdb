<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;


class Profil extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $tahun_ajaran_aktif = $this->ModelTahunAjaran->tahunAjaranAktif();
        $this->tahun_mulai = date("Y", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $this->bulan_mulai = date("m", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $this->hari_mulai = date("d", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $this->tahun_akhir = date("Y", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $this->bulan_akhir = date("m", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $this->hari_akhir = date("d", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $this->tahun_pengumuman = date("Y", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $this->bulan_pengumuman = date("m", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $this->hari_pengumuman = date("d", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
    }

    public function index($id_user)
    {
        $data = [
            'title' => 'Profil Pengguna',
            'user'  => $this->ModelUser->detailData($id_user),
            'sekolah'  => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_mulai' => $this->tahun_mulai,
            'bulan_mulai' => $this->bulan_mulai,
            'hari_mulai' => $this->hari_mulai,
            'tahun_akhir' => $this->tahun_akhir,
            'bulan_akhir' => $this->bulan_akhir,
            'hari_akhir' => $this->hari_akhir,
            'tahun_pengumuman' => $this->tahun_pengumuman,
            'bulan_pengumuman' => $this->bulan_pengumuman,
            'hari_pengumuman' => $this->hari_pengumuman,
            'isi'   => 'profil/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesEdit($id_user)
    {
        $userValid = [
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($userValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('username')
                ];
                $this->ModelUser->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->ModelUser->detailData($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                //mengganti nama 
                $nameFoto = $foto->getRandomName();

                // memindahkan lokasi foto
                $foto->move('foto', $nameFoto);

                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('username'),
                    'foto' => $nameFoto,
                ];

                $this->ModelUser->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');

            return redirect()->to(base_url('profil/index/' . $id_user));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('profil/index/' . $id_user));
        }
    }

    public function ubahPassword($id_user)
    {
        $data = [
            'title' => 'Ubah Password',
            'user'  => $this->ModelUser->detailData($id_user),
            'sekolah'  => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_mulai' => $this->tahun_mulai,
            'bulan_mulai' => $this->bulan_mulai,
            'hari_mulai' => $this->hari_mulai,
            'tahun_akhir' => $this->tahun_akhir,
            'bulan_akhir' => $this->bulan_akhir,
            'hari_akhir' => $this->hari_akhir,
            'tahun_pengumuman' => $this->tahun_pengumuman,
            'bulan_pengumuman' => $this->bulan_pengumuman,
            'hari_pengumuman' => $this->hari_pengumuman,
            'isi'   => 'profil/v_ubah_password'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesUbahPassword($id_user)
    {
        $userValid = [
            'password' => [
                'label' => 'Password Lama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'password_baru' => [
                'label' => 'Password Baru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($userValid)) {

            $password_lama = $this->request->getPost('password');

            $cek_password = $this->ModelUser->cekPassword($password_lama);
            if ($cek_password) {
                $password_baru = $this->request->getPost('password_baru');

                $data = [
                    'id_user' => $id_user,
                    'password' => $password_baru,
                ];

                $this->ModelUser->edit($data);


                session()->setFlashdata('pesan', 'Password Berhasil Diubah!!!');

                return redirect()->to(base_url('profil/ubahPassword/' . $id_user));
            } else {
                session()->setFlashdata('error', 'Password Lama Salah!!!');

                return redirect()->to(base_url('profil/ubahPassword/' . $id_user));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('profil/ubahPassword/' . $id_user));
        }
    }
}
