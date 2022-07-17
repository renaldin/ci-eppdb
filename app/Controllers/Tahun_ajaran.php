<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;

class Tahun_ajaran extends BaseController
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
            'title' => 'Kelola Tahun Ajaran',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran' => $this->ModelTahunAjaran->dataTahunAjaran(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'   => 'admin/tahun_ajaran/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesTambah()
    {
        $tahunAjaranValid = [
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_akhir' => [
                'label' => 'Tanggal Akhir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_pengumuman' => [
                'label' => 'Tanggal Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($tahunAjaranValid)) {
            //jika valid

            $data = [
                'tahun_ajaran'          => $this->request->getPost('tahun_ajaran'),
                'tanggal_mulai'         => $this->request->getPost('tanggal_mulai'),
                'tanggal_akhir'         => $this->request->getPost('tanggal_akhir'),
                'tanggal_pengumuman'    => $this->request->getPost('tanggal_pengumuman'),
                'status'                => 0
            ];

            $this->ModelTahunAjaran->tambah($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('tahun_ajaran'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function set_status($id_tahun_ajaran)
    {
        // reset status tahun akademik
        $this->ModelTahunAjaran->reset_status();

        // set status tahun akademik
        $data = [
            'id_tahun_ajaran'   => $id_tahun_ajaran,
            'status'            => 1
        ];

        $this->ModelTahunAjaran->edit($data);
        session()->setFlashdata('pesan', 'Tahun Ajaran Berhasil Diaktifkan!!!');

        return redirect()->to(base_url('tahun_ajaran'));
    }

    public function hapus($id_tahun_ajaran)
    {

        $data = [
            'id_tahun_ajaran'   => $id_tahun_ajaran,
        ];

        $this->ModelTahunAjaran->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('tahun_ajaran'));
    }
}
