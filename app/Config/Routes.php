<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Landing');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// landing
$routes->get('/', 'Landing::index');
$routes->get('/landing/bacaInformai/(:num)', 'Landing::bacaInformasi/$1');

// auth
$routes->get('/auth/login', 'Auth::index');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/verifikasiEmail', 'Auth::verifikasiEmail');
$routes->get('/auth/lupaAkun', 'Auth::lupaAkun');
$routes->get('/auth/logout', 'Auth::logout');

// profil
$routes->get('/profil/(:num)', 'Profil::index/$1');
$routes->get('/profil/ubahPassword/(:num)', 'Profil::ubahPassword/$1');

// admin
// informasi
$routes->get('/informasi', 'Informasi::index');
$routes->get('/informasi/tambah', 'Informasi::tambah');
$routes->get('/informasi/edit/(:num)', 'Informasi::edit/$1');
$routes->get('/informasi/hapus/(:num)', 'Informasi::hapus/$1');
$routes->get('/informasi/detail/(:num)', 'Informasi::detail/$1');
// profil sekolah
$routes->get('/profilSekolah', 'Profil_sekolah::index');
// tahun ajaran
$routes->get('/tahunAjaran', 'Tahun_ajaran::index');
$routes->get('/tahunAjaran/hapus/(:num)', 'Tahun_ajaran::hapus/$1');
$routes->get('/tahunAjaran/setStatus/(:num)', 'Tahun_ajaran::set_status/$1');
// pendaftaran
$routes->get('/daftar', 'Daftar::index');
$routes->get('/daftar/detail/(:num)', 'Daftar::detail/$1');
$routes->get('/daftar/downloadFoto/(:num)', 'Daftar::downloadFoto/$1');
$routes->get('/daftar/downloadKartuKeluarga/(:num)', 'Daftar::downloadKartuKeluarga/$1');
$routes->get('/daftar/downloadAkteKelahiran/(:num)', 'Daftar::downloadAkteKelahiran/$1');
$routes->get('/daftar/downloadKtpAyah/(:num)', 'Daftar::downloadKtpAyah/$1');
$routes->get('/daftar/downloadKtpIbu/(:num)', 'Daftar::downloadKtpIbu/$1');
$routes->get('/daftar/downloadKartu/(:num)', 'Daftar::downloadKartu/$1');
$routes->get('/daftar/lulus/(:num)', 'Daftar::lulus/$1');
$routes->get('/daftar/tidakLulus/(:num)', 'Daftar::tidakLulus/$1');
// laporan
$routes->get('/laporan/pendaftaranLulus', 'Daftar::pendaftaranLulus');
$routes->get('/laporan/pendaftaranTidakLulus', 'Daftar::pendaftaranTidakLulus');
$routes->get('/laporan/detailLulus/(:num)', 'Daftar::detailLulus/$1');
$routes->get('/laporan/detailTidakLulus/(:num)', 'Daftar::detailTidakLulus/$1');
$routes->get('/laporan/printSemuaLulus', 'Daftar::printSemuaLulus');
$routes->get('/laporan/printSemuaTidakLulus', 'Daftar::printSemuaTidakLulus');
$routes->get('/laporan/printSatuan/(:num)', 'Daftar::printSatuan/$1');
// user
$routes->get('/pengguna', 'User::index');
$routes->get('/pengguna/detail/(:num)', 'User::detail/$1');
$routes->get('/pengguna/hapus/(:num)', 'User::hapus/$1');


// calon siswa
// formulir pendaftaran
$routes->get('/formulirPendaftaran', 'Formulir_pendaftaran::index');
$routes->get('/formulirPendaftaran/hasilDataPendaftaran/(:num)', 'Formulir_pendaftaran::hasilDataPendaftaran/$1');
// pengumuman
$routes->get('/pengumuman', 'Pengumuman::index');
$routes->get('/pengumuman/cetakKelulusan/(:num)', 'Pengumuman::cetakKelulusan/$1');






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
