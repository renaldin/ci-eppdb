<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;
use App\Models\ModelPendaftaran;
use TCPDF;

class Pengumuman extends BaseController
{
    public function __construct()
    {
        helper('form');
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
            'title' => 'Pengumuman PPDB',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran' => $this->ModelTahunAjaran->tahunAjaranAktif(),
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
            'isi'   => 'calon_siswa/pengumuman/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cekPengumuman()
    {
        $pengumumanValid = [
            'id_pendaftaran' => [
                'label' => 'Kode Pendaftaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi.'
                ]
            ],
        ];

        if ($this->validate($pengumumanValid)) {
            $id_pendaftaran = $this->request->getPost('id_pendaftaran');

            $cekPendaftaranPerUser = $this->ModelPendaftaran->perUser(session()->get('id_user'));
            if ($cekPendaftaranPerUser['id_pendaftaran'] == $id_pendaftaran) {
                $cekData = $this->ModelPendaftaran->detail($id_pendaftaran);

                if ($cekData) {
                    if ($cekData['status'] == 'Lulus') {
                        // Pass Data
                        $data = [
                            'title' => 'Pengumuman Lulus',
                            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
                            'tahun_ajaran' => $this->ModelTahunAjaran->tahunAjaranAktif(),
                            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
                            'tahun_mulai' => $this->tahun_mulai,
                            'bulan_mulai' => $this->bulan_mulai,
                            'hari_mulai' => $this->hari_mulai,
                            'tahun_akhir' => $this->tahun_akhir,
                            'bulan_akhir' => $this->bulan_akhir,
                            'hari_akhir' => $this->hari_akhir,
                            'tahun_pengumuman' => $this->tahun_pengumuman,
                            'bulan_pengumuman' => $this->bulan_pengumuman,
                            'hari_pengumuman' => $this->hari_pengumuman,
                            'isi'   => 'calon_siswa/pengumuman/v_lulus'
                        ];

                        return view('layout/v_wrapper', $data);
                    } elseif ($cekData['status'] == 'Tidak Lulus') {
                        // // Data Does Not Pass
                        $data = [
                            'title' => 'Pengumuman Tidak Lulus',
                            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
                            'tahun_ajaran' => $this->ModelTahunAjaran->tahunAjaranAktif(),
                            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
                            'tahun_mulai' => $this->tahun_mulai,
                            'bulan_mulai' => $this->bulan_mulai,
                            'hari_mulai' => $this->hari_mulai,
                            'tahun_akhir' => $this->tahun_akhir,
                            'bulan_akhir' => $this->bulan_akhir,
                            'hari_akhir' => $this->hari_akhir,
                            'tahun_pengumuman' => $this->tahun_pengumuman,
                            'bulan_pengumuman' => $this->bulan_pengumuman,
                            'hari_pengumuman' => $this->hari_pengumuman,
                            'isi'   => 'calon_siswa/pengumuman/v_tidak_lulus'
                        ];

                        return view('layout/v_wrapper', $data);
                    } elseif ($cekData['status'] == 'Belum Diseleksi') {
                        // Not Selected
                        session()->setFlashdata('error', 'Data Belum Diseleksi. Silahkan Tunggu Tanggal Pengumuman PPDB Online Dibuka!!!');

                        return redirect()->to(base_url('pengumuman'));
                    }
                } else {
                    // Message data does not exist
                    session()->setFlashdata('error', 'Data Tidak Ditemukan. Coba Lagi!!!');

                    return redirect()->to(base_url('pengumuman'));
                }
            } else {
                // Message data does not exist
                session()->setFlashdata('error', 'Kode Pendaftaran Salah. Coba Cek Di Halaman Hasil Data Pendaftaran!!!');

                return redirect()->to(base_url('pengumuman'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengumuman'));
        }
    }

    public function cetakKelulusan($id_pendaftaran)
    {
        // FPDF
        $data = [
            'title'                 => 'Print Satuan Data Pendaftaran',
            'sekolah'               => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'tahun_ajaran_aktif'    => $this->ModelTahunAjaran->tahunAjaranAktif(),
            'pendaftaran'           => $this->ModelPendaftaran->detail($id_pendaftaran),
        ];

        $html = view('calon_siswa/pengumuman/v_cetak_lulus', $data);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin SDN Cibogo');
        $pdf->SetTitle('Kelulusan');
        $pdf->SetSubject('Kelulusan');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('kelulusan.pdf', 'I');
    }

    public function tanggal_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
}
