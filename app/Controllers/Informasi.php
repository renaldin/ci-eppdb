<?php

namespace App\Controllers;

use App\Models\ModelInformasi;
use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;

class Informasi extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelInformasi = new ModelInformasi();
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
            'title' => 'Kelola Informasi PPDB',
            'informasi' => $this->ModelInformasi->dataInformasi(),
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
            'isi'   => 'admin/informasi/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function tambah()
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
            'title' => 'Tambah Informasi PPDB',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'informasi' => $this->ModelInformasi->dataInformasi(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'   => 'admin/informasi/v_tambah'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesTambah()
    {
        $informasiValid = [
            'judul_informasi' => [
                'label' => 'Judul Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_informasi' => [
                'label' => 'Tanggal Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'isi_informasi' => [
                'label' => 'Isi Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($informasiValid)) {
            //jika valid
            //mengambil data foto di form
            $gambar = $this->request->getFile('gambar');
            //mengganti nama 
            $nameFoto = $gambar->getRandomName();

            $data = [
                'judul_informasi' => $this->request->getPost('judul_informasi'),
                'tanggal_informasi' => $this->request->getPost('tanggal_informasi'),
                'isi_informasi' => $this->request->getPost('isi_informasi'),
                'gambar' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $gambar->move('gambar_informasi_ppdb', $nameFoto);

            $this->ModelInformasi->tambah($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('informasi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id_informasi)
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
            'title' => 'Edit Informasi PPDB',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'informasi' => $this->ModelInformasi->detailDataInformasi($id_informasi),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/informasi/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesEdit($id_informasi)
    {
        $informasivalid = [
            'judul_informasi' => [
                'label' => 'Judul Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_informasi' => [
                'label' => 'Tanggal Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'isi_informasi' => [
                'label' => 'Isi Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'max_size[gambar,2024]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($informasivalid)) {
            //jika valid
            //mengambil data foto di form
            $gambar = $this->request->getFile('gambar');

            if ($gambar->getError() == 4) {
                $data = [
                    'id_informasi' => $id_informasi,
                    'judul_informasi' => $this->request->getPost('judul_informasi'),
                    'tanggal_informasi' => $this->request->getPost('tanggal_informasi'),
                    'isi_informasi' => $this->request->getPost('isi_informasi')
                ];
                $this->ModelInformasi->edit($data);
            } else {
                //menghapus foto lama
                $informasi = $this->ModelInformasi->detailDataInformasi($id_informasi);
                if ($informasi['gambar'] != "") {
                    unlink('gambar_informasi_ppdb/' . $informasi['gambar']);
                }
                //mengganti nama 
                $nameFoto = $gambar->getRandomName();

                $data = [
                    'id_informasi' => $id_informasi,
                    'judul_informasi' => $this->request->getPost('judul_informasi'),
                    'tanggal_informasi' => $this->request->getPost('tanggal_informasi'),
                    'isi_informasi' => $this->request->getPost('isi_informasi'),
                    'gambar' => $nameFoto,
                ];
                // memindahkan lokasi foto
                $gambar->move('gambar_informasi_ppdb', $nameFoto);
                $this->ModelInformasi->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');
            return redirect()->to(base_url('informasi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('informasi/edit/' . $id_informasi));
        }
    }

    public function detail($id_informasi)
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
            'title' => 'Detail Informasi PPDB',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'informasi' => $this->ModelInformasi->detailDataInformasi($id_informasi),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/informasi/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function hapus($id_informasi)
    {
        //menghapus foto lama
        $informasi = $this->ModelInformasi->detailDataInformasi($id_informasi);
        if ($informasi['gambar'] != "") {
            unlink('gambar_informasi_ppdb/' . $informasi['gambar']);
        }

        $data = [
            'id_informasi'   => $id_informasi,
        ];

        $this->ModelInformasi->hapusDataInformasi($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('informasi'));
    }
}
