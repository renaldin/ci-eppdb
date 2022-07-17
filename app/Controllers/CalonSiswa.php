<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;
use App\Models\ModelPendaftaran;

class CalonSiswa extends BaseController
{
    public function __construct()
    {
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelPendaftaran = new ModelPendaftaran();
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

    public function index()
    {
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Dashboard',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_mulai' => $this->tahun_mulai,
            'bulan_mulai' => $this->bulan_mulai,
            'hari_mulai' => $this->hari_mulai,
            'tahun_akhir' => $this->tahun_akhir,
            'bulan_akhir' => $this->bulan_akhir,
            'hari_akhir' => $this->hari_akhir,
            'tahun_pengumuman' => $this->tahun_pengumuman,
            'bulan_pengumuman' => $this->bulan_pengumuman,
            'hari_pengumuman' => $this->hari_pengumuman,
            'pendaftaran' => $this->ModelPendaftaran->pendaftaranUser($id_user),
            'isi'   => 'v_calon_siswa'
        ];
        return view('layout/v_wrapper', $data);
    }
}
