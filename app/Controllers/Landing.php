<?php

namespace App\Controllers;

use App\Models\ModelProfilSekolah;
use App\Models\ModelInformasi;
use App\Models\ModelTahunAjaran;

class Landing extends BaseController
{
    public function __construct()
    {
        $this->ModelProfilSekolah = new ModelProfilSekolah();
        $this->ModelInformasi = new ModelInformasi();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
    }

    public function index()
    {
        $data = [
            'title'         => 'SDN Cibogo',
            'tahun_ajaran'  => $this->ModelTahunAjaran->tahunAjaranAktif(),
            'sekolah'       => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'informasi'     => $this->ModelInformasi->dataInformasi(),
            'isi_landing'   => 'landing/v_index'
        ];
        return view('layout/v_wrapper_landing', $data);
    }

    public function bacaInformasi($id_informasi)
    {
        $data = [
            'title'         => 'Baca Informasi',
            'sekolah'       => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'informasi'     => $this->ModelInformasi->detailDataInformasi($id_informasi),
            'isi_landing'   => 'landing/v_bacaInformasi'
        ];
        return view('layout/v_wrapper_landing', $data);
    }
}
