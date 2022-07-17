<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelTahunAjaran;
use App\Models\ModelPendaftaran;
use CodeIgniter\I18n\Time;

class Formulir_pendaftaran extends BaseController
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
            'title' => 'Formulir Pendaftaran',
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
            'isi'   => 'calon_siswa/formulir_pendaftaran/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function prosesDaftar()
    {
        $pendaftaranValid = [
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'agama' => [
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'golongan_darah' => [
                'label' => 'Golongan Darah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'kerja_ayah' => [
                'label' => 'Pekerjaan Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'pendidikan_ayah' => [
                'label' => 'Pendidikan Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nama_ibu' => [
                'label' => 'Nama Ibu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'kerja_ibu' => [
                'label' => 'Pekerjaan Ibu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'pendidikan_ibu' => [
                'label' => 'Pendidikan Ibu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'telepon_rumah' => [
                'label' => 'Nomor Telepon/Whatsapp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'b_foto' => [
                'label' => 'Foto Formal',
                'rules' => 'uploaded[b_foto]|max_size[b_foto,1024]|mime_in[b_foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'b_akte' => [
                'label' => 'Scan Akte Kelahiran',
                'rules' => 'uploaded[b_akte]|max_size[b_akte,1024]|mime_in[b_akte,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'b_kk' => [
                'label' => 'Scan Kartu Keluarga',
                'rules' => 'uploaded[b_kk]|max_size[b_kk,1024]|mime_in[b_kk,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'b_ktp_ayah' => [
                'label' => 'Scan KTP Ayah',
                'rules' => 'uploaded[b_ktp_ayah]|max_size[b_ktp_ayah,1024]|mime_in[b_ktp_ayah,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'b_ktp_ibu' => [
                'label' => 'Scan KTP Ibu',
                'rules' => 'uploaded[b_ktp_ibu]|max_size[b_ktp_ibu,1024]|mime_in[b_ktp_ibu,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
            'b_kartu' => [
                'label' => 'Scan Kartu KIP',
                'rules' => 'max_size[b_kartu,1024]|mime_in[b_kartu,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 1 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($pendaftaranValid)) {
            //jika valid
            //mengambil data foto di form
            $b_foto = $this->request->getFile('b_foto');
            $b_akte = $this->request->getFile('b_akte');
            $b_kk = $this->request->getFile('b_kk');
            $b_ktp_ayah = $this->request->getFile('b_ktp_ayah');
            $b_ktp_ibu = $this->request->getFile('b_ktp_ibu');
            $b_kartu = $this->request->getFile('b_kartu');

            // id iser aktif
            $id_user = session()->get('id_user');

            // Kode Pendaftaran
            $tahun_ajaran_aktif = $this->ModelTahunAjaran->tahunAjaranAktif();
            if ($this->ModelPendaftaran->dataPendaftaran() == null) {
                $hari_mulai = $this->hari_mulai;
                $bulan_mulai = $this->bulan_mulai;
                $hari_akhir = $this->hari_akhir;
                $bulan_akhir = $this->bulan_akhir;
                $kode_pendaftaran = date('Y') . $bulan_mulai . $hari_mulai . $bulan_akhir . $hari_akhir  . 1;
            } else {
                $kode_pendaftaran_terakhir = $this->ModelPendaftaran->kodePendaftaranTerakhir();
                $kode_pendaftaran = $kode_pendaftaran_terakhir->id_pendaftaran + 1;
            }

            // generate umur
            $input_tanggal_lahir = $this->request->getPost('tanggal_lahir');
            $tanggal_lahir = Time::parse($input_tanggal_lahir);
            $sekarang = Time::parse("today");
            if ($tanggal_lahir > $sekarang) {
                $thn = "0";
                $bln = "0";
                $tgl = "0";
            }
            $thn = $sekarang->diff($tanggal_lahir)->y;
            $bln = $sekarang->diff($tanggal_lahir)->m;
            $tgl = $sekarang->diff($tanggal_lahir)->d;
            $umur = $thn . " tahun, " . $bln . " bulan, " . $tgl . " hari";


            if ($b_kartu->getError() == 4) {
                //mengganti nama 
                $namefoto = $b_foto->getRandomName();
                $nameakte = $b_akte->getRandomName();
                $namekk = $b_kk->getRandomName();
                $namektp_ayah = $b_ktp_ayah->getRandomName();
                $namektp_ibu = $b_ktp_ibu->getRandomName();

                $data = [
                    'id_pendaftaran'    => $kode_pendaftaran,
                    'nama_lengkap'      => $this->request->getPost('nama_lengkap'),
                    'tanggal_lahir'     => $this->request->getPost('tanggal_lahir'),
                    'umur'              => $umur,
                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                    'agama'             => $this->request->getPost('agama'),
                    'golongan_darah'    => $this->request->getPost('golongan_darah'),
                    'alamat'            => $this->request->getPost('alamat'),
                    'nama_ayah'         => $this->request->getPost('nama_ayah'),
                    'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
                    'pendidikan_ayah'   => $this->request->getPost('pendidikan_ayah'),
                    'nama_ibu'          => $this->request->getPost('nama_ibu'),
                    'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
                    'pendidikan_ibu'    => $this->request->getPost('pendidikan_ibu'),
                    'telepon_rumah'     => $this->request->getPost('telepon_rumah'),
                    'b_foto'            => $namefoto,
                    'b_akte'            => $nameakte,
                    'b_kk'              => $namekk,
                    'b_ktp_ayah'        => $namektp_ayah,
                    'b_ktp_ibu'         => $namektp_ibu,
                    'tanggal_daftar'    => date('Y-m-d'),
                    'status'            => 'Belum Diseleksi',
                    'id_tahun_ajaran'   => $this->request->getPost('id_tahun_ajaran'),
                    'id_user'           => $id_user,
                ];
                // memindahkan lokasi foto
                $b_foto->move('pendaftaran', $namefoto);
                $b_akte->move('pendaftaran', $nameakte);
                $b_kk->move('pendaftaran', $namekk);
                $b_ktp_ayah->move('pendaftaran', $namektp_ayah);
                $b_ktp_ibu->move('pendaftaran', $namektp_ibu);
            } else {
                //mengganti nama 
                $namefoto = $b_foto->getRandomName();
                $nameakte = $b_akte->getRandomName();
                $namekk = $b_kk->getRandomName();
                $namektp_ayah = $b_ktp_ayah->getRandomName();
                $namektp_ibu = $b_ktp_ibu->getRandomName();
                $namekartu = $b_kartu->getRandomName();

                $data = [
                    'id_pendaftaran' => $kode_pendaftaran,
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'umur' => $umur,
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'agama' => $this->request->getPost('agama'),
                    'golongan_darah' => $this->request->getPost('golongan_darah'),
                    'alamat' => $this->request->getPost('alamat'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'kerja_ayah' => $this->request->getPost('kerja_ayah'),
                    'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'kerja_ibu' => $this->request->getPost('kerja_ibu'),
                    'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                    'telepon_rumah' => $this->request->getPost('telepon_rumah'),
                    'b_foto' => $namefoto,
                    'b_akte' => $nameakte,
                    'b_kk' => $namekk,
                    'b_ktp_ayah' => $namektp_ayah,
                    'b_ktp_ibu' => $namektp_ibu,
                    'b_kartu' => $namekartu,
                    'tanggal_daftar' => date('Y-m-d'),
                    'status' => 'Belum Diseleksi',
                    'id_tahun_ajaran' => $this->request->getPost('id_tahun_ajaran'),
                    'id_user' => $id_user,
                ];
                // memindahkan lokasi foto
                $b_foto->move('pendaftaran', $namefoto);
                $b_akte->move('pendaftaran', $nameakte);
                $b_kk->move('pendaftaran', $namekk);
                $b_ktp_ayah->move('pendaftaran', $namektp_ayah);
                $b_ktp_ibu->move('pendaftaran', $namektp_ibu);
                $b_kartu->move('pendaftaran', $namekartu);
            }

            $this->ModelPendaftaran->tambah($data);

            return redirect()->to(base_url('formulir_pendaftaran/hasilDataPendaftaran/' . $data['id_pendaftaran']));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function hasilDataPendaftaran($id_pendaftaran)
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
            'title' => 'Hasil Data Pendaftaran',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'pendaftaran' => $this->ModelPendaftaran->detail($id_pendaftaran),
            'tahun_ajaran_aktif' => $tahun_ajaran_aktif,
            'tahun_mulai' => $tahun_mulai,
            'bulan_mulai' => $bulan_mulai,
            'hari_mulai' => $hari_mulai,
            'tahun_akhir' => $tahun_akhir,
            'bulan_akhir' => $bulan_akhir,
            'hari_akhir' => $hari_akhir,
            'tahun_pengumuman' => $tahun_pengumuman,
            'bulan_pengumuman' => $bulan_pengumuman,
            'hari_pengumuman' => $hari_pengumuman,
            'isi' => 'calon_siswa/formulir_pendaftaran/v_hasil_data_pendaftaran'
        ];
        return view('layout/v_wrapper', $data);
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
