<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelInformasi;
use App\Models\ModelPendaftaran;
use App\Models\ModelTahunAjaran;
use App\Models\ModelUser;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelInformasi = new ModelInformasi();
        $this->ModelPendaftaran = new ModelPendaftaran();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelUser = new ModelUser();
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
            'title' => 'Dashboard',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'jumlah_informasi' => $this->ModelInformasi->jumlahInformasi(),
            'jumlah_pendaftaran' => $this->ModelPendaftaran->jumlahPendaftaran(),
            'jumlah_pendaftaran_lulus' => $this->ModelPendaftaran->jumlahPendaftaranLulus(),
            'jumlah_pendaftaran_tidak_lulus' => $this->ModelPendaftaran->jumlahPendaftaranTidakLulus(),
            'jumlah_pendaftaran_belum_seleksi' => $this->ModelPendaftaran->jumlahPendaftaranBelumSeleksi(),
            'jumlah_tahun_ajaran' => $this->ModelTahunAjaran->jumlahTahunAjaran(),
            'jumlah_user' => $this->ModelUser->jumlahUser(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'   => 'v_admin'
        ];
        return view('layout/v_wrapper', $data);
    }
}
