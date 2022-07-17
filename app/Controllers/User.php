<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;


class User extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
    }


    public function index()
    {
        $tahun_ajaran_aktif = $this->ModelTahunAjaran->tahunAjaranAktif();
        $tahun_mulai = date("Y", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $bulan_mulai = date("m", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $hari_mulai = date("d", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $tahun_akhir = date("Y", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $bulan_akhir = date("m", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $hari_akhir = date("d", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $tahun_pengumuman = date("Y", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $bulan_pengumuman = date("m", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $hari_pengumuman = date("d", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));

        $data = [
            'title'     => 'Kelola Pengguna',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'user'  => $this->ModelUser->dataUser(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'       => 'admin/user/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesTambah()
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
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($userValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto');
            //mengganti nama 
            $nameFoto = $foto->getRandomName();

            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'status_verifikasi' => 'Sudah Verifikasi',
                'role' => $this->request->getPost('role'),
                'password' => $this->request->getPost('password'),
                'foto' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $foto->move('foto', $nameFoto);

            $this->ModelUser->tambah($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
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
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'role' => [
                'label' => 'Role',
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
                    'status_verifikasi' => 'Sudah Verifikasi',
                    'username' => $this->request->getPost('username'),
                    'role' => $this->request->getPost('role'),
                    'password' => $this->request->getPost('password'),
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
                    'status_verifikasi' => 'Sudah Verifikasi',
                    'role' => $this->request->getPost('role'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nameFoto,
                ];

                $this->ModelUser->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');

            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function detail($id_user)
    {
        $tahun_ajaran_aktif = $this->ModelTahunAjaran->tahunAjaranAktif();
        $tahun_mulai = date("Y", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $bulan_mulai = date("m", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $hari_mulai = date("d", strtotime($tahun_ajaran_aktif['tanggal_mulai']));
        $tahun_akhir = date("Y", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $bulan_akhir = date("m", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $hari_akhir = date("d", strtotime($tahun_ajaran_aktif['tanggal_akhir']));
        $tahun_pengumuman = date("Y", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $bulan_pengumuman = date("m", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));
        $hari_pengumuman = date("d", strtotime($tahun_ajaran_aktif['tanggal_pengumuman']));

        $data = [
            'title' => 'Detail Pengguna',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'user' => $this->ModelUser->detailData($id_user),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'   => 'admin/user/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function hapus($id_user)
    {
        //menghapus foto lama
        $user = $this->ModelUser->detailData($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }

        $data = [
            'id_user'   => $id_user,
        ];

        $this->ModelUser->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('user'));
    }
}
