<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;

class Profil_sekolah extends BaseController
{

    public function __construct()
    {
        helper('form');
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
            'title' => 'Kelola Profil Sekolah',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/profil_sekolah/v_index'
        ];

        return view('layout/v_wrapper', $data);
    }

    public function prosesUpdate($id_profil_sekolah)
    {
        $profilsekolahvalid = [
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'akreditasi' => [
                'label' => 'Akreditasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'jumlah_semua_siswa' => [
                'label' => 'Jumlah Semua Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'deskripsi_atas' => [
                'label' => 'Deskripsi Web Landing Home',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'deskripsi_bawah' => [
                'label' => 'Deskripsi Web Landing Profil Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'telepon' => [
                'label' => 'Nomor Telepon',
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
            'wa' => [
                'label' => 'Nomor Whatsapp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'logo' => [
                'label' => 'Logo',
                'rules' => 'max_size[logo,2024]|mime_in[logo,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'gambar_sekolah1' => [
                'label' => 'Gambar Sekolah 1',
                'rules' => 'max_size[gambar_sekolah1,2024]|mime_in[gambar_sekolah1,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'gambar_sekolah2' => [
                'label' => 'Gambar Sekolah 2',
                'rules' => 'max_size[gambar_sekolah2,2024]|mime_in[gambar_sekolah2,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ]
        ];

        if ($this->validate($profilsekolahvalid)) {
            //jika valid
            //mengambil data foto di form
            $logo = $this->request->getFile('logo');
            $gambar_sekolah1 = $this->request->getFile('gambar_sekolah1');
            $gambar_sekolah2 = $this->request->getFile('gambar_sekolah2');

            if ($logo->getError() == 4) {
                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa')
                ];
                $this->ModelProfilSekolah->edit($data);
            } else {
                //menghapus foto lama
                $sekolah = $this->ModelProfilSekolah->dataProfilSekolah($id_profil_sekolah);
                if ($sekolah['logo'] != "") {
                    unlink('gambar_profil_sekolah/' . $sekolah['logo']);
                }

                $nameLogo = $logo->getRandomName();

                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa'),
                    'logo' => $nameLogo
                ];
                // memindahkan lokasi foto
                $logo->move('gambar_profil_sekolah', $nameLogo);
                $this->ModelProfilSekolah->edit($data);
            }

            if ($gambar_sekolah1->getError() == 4) {
                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa')
                ];
                $this->ModelProfilSekolah->edit($data);
            } else {
                $sekolah = $this->ModelProfilSekolah->dataProfilSekolah($id_profil_sekolah);
                //menghapus foto lama
                if ($sekolah['gambar_sekolah1'] != "") {
                    unlink('gambar_profil_sekolah/' . $sekolah['gambar_sekolah1']);
                }

                $nameSekolah1 = $gambar_sekolah1->getRandomName();

                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa'),
                    'gambar_sekolah1' => $nameSekolah1,
                ];
                // memindahkan lokasi foto
                $gambar_sekolah1->move('gambar_profil_sekolah', $nameSekolah1);
                $this->ModelProfilSekolah->edit($data);
            }

            if ($gambar_sekolah2->getError() == 4) {
                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa')
                ];
                $this->ModelProfilSekolah->edit($data);
            } else {
                $sekolah = $this->ModelProfilSekolah->dataProfilSekolah($id_profil_sekolah);
                //menghapus foto lama
                if ($sekolah['gambar_sekolah2'] != "") {
                    unlink('gambar_profil_sekolah/' . $sekolah['gambar_sekolah2']);
                }

                $nameSekolah2 = $gambar_sekolah2->getRandomName();

                $data = [
                    'id_profil_sekolah' => $id_profil_sekolah,
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'akreditasi' => $this->request->getPost('akreditasi'),
                    'jumlah_semua_siswa' => $this->request->getPost('jumlah_semua_siswa'),
                    'deskripsi_atas' => $this->request->getPost('deskripsi_atas'),
                    'deskripsi_bawah' => $this->request->getPost('deskripsi_bawah'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'wa' => $this->request->getPost('wa'),
                    'gambar_sekolah2' => $nameSekolah2,
                ];
                // memindahkan lokasi foto
                $gambar_sekolah2->move('gambar_profil_sekolah', $nameSekolah2);
                $this->ModelProfilSekolah->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');
            return redirect()->to(base_url('profil_sekolah'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('profil_sekolah'));
        }
    }
}
