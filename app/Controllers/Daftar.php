<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelPendaftaran;
use App\Models\ModelTahunAjaran;

class Daftar extends BaseController
{

    public function __construct()
    {
        helper('form');
        helper('download');
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelPendaftaran = new ModelPendaftaran();
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
            'title' => 'Pendaftaran',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran' => $this->ModelPendaftaran->dataPendaftaran(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/pendaftaran/v_index'
        ];

        return view('layout/v_wrapper', $data);
    }

    public function detail($id_pendaftaran)
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
            'title' => 'Detail Pendaftaran',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/pendaftaran/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function downloadFoto($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_foto']));
        $nama = 'FotoPribadi' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function downloadKartuKeluarga($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_kk']));
        $nama = 'KartuKeluarga' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function downloadAkteKelahiran($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_akte']));
        $nama = 'AkteKelahiran' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function downloadKtpAyah($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_ktp_ayah']));
        $nama = 'KtpAyah' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function downloadKtpIbu($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_ktp_ibu']));
        $nama = 'KtpIbu' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function downloadKartu($id_pendaftaran)
    {
        $daftar = $this->ModelPendaftaran->detail($id_pendaftaran);
        $data = file_get_contents(base_url('pendaftaran/' . $daftar['b_kartu']));
        $nama = 'Kartu' . str_replace(' ', '', $daftar['nama_lengkap']) . '.jpg';

        return $this->response->download($nama, $data);
    }

    public function lulus($id_pendaftaran)
    {
        $data = [
            'id_pendaftaran'    => $id_pendaftaran,
            'status'            => 'Lulus'
        ];
        $this->ModelPendaftaran->lulus($data);

        session()->setFlashdata('success', 'Calon Siswa Berhasil Lulus!!!');
        return redirect()->to(base_url('daftar/detail/' . $id_pendaftaran));
    }

    public function tidakLulus($id_pendaftaran)
    {
        $data = [
            'id_pendaftaran'    => $id_pendaftaran,
            'status'            => 'Tidak Lulus'
        ];
        $this->ModelPendaftaran->lulus($data);

        session()->setFlashdata('pesan', 'Calon Siswa Gagal Lulus!!!');
        return redirect()->to(base_url('daftar/detail/' . $id_pendaftaran));
    }

    public function pendaftaranLulus()
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
            'title'         => 'Pendaftaran Lulus',
            'sekolah'       => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran'   => $this->ModelPendaftaran->pendaftaranLulus(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'         => 'admin/pendaftaran/v_lulus'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function pendaftaranTidakLulus()
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
            'title'         => 'Pendaftaran Tidak Lulus',
            'sekolah'       => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran'   => $this->ModelPendaftaran->pendaftaranTidakLulus(),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi'           => 'admin/pendaftaran/v_tidak_lulus'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailLulus($id_pendaftaran)
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
            'title' => 'Detail Pendaftaran Lulus',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/pendaftaran/v_detail_lulus'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailTidakLulus($id_pendaftaran)
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
            'title' => 'Detail Pendaftaran Tidak Lulus',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'admin/pendaftaran/v_detail_tidak_lulus'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function printSemuaLulus()
    {
        $data = [
            'title'                 => 'Print Semua Data Lulus',
            'sekolah'               => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran_aktif'    => $this->ModelTahunAjaran->tahunAjaranAktif(),
            'pendaftaran'           => $this->ModelPendaftaran->pendaftaranLulus(),
        ];
        return view('admin/pendaftaran/v_print_semua_lulus', $data);
    }

    public function printSemuaTidakLulus()
    {
        $data = [
            'title'                 => 'Print Semua Data Tidak Lulus',
            'sekolah'               => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran_aktif'    => $this->ModelTahunAjaran->tahunAjaranAktif(),
            'pendaftaran'           => $this->ModelPendaftaran->pendaftaranTidakLulus(),
        ];
        return view('admin/pendaftaran/v_print_semua_tidak_lulus', $data);
    }

    public function printSatuan($id_pendaftaran)
    {
        $data = [
            'title'                 => 'Print Satuan Data Pendaftaran',
            'sekolah'               => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran_aktif'    => $this->ModelTahunAjaran->tahunAjaranAktif(),
            'pendaftaran'           => $this->ModelPendaftaran->detail($id_pendaftaran),
        ];
        return view('admin/pendaftaran/v_print_satuan', $data);
    }
}
