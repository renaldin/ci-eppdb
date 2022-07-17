<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelProfilSekolah;
use App\Models\ModelUser;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
        $this->ModelUser = new ModelUser();
        $this->ModelProfilSekolah = new ModelProfilSekolah();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'isi_auth'   => 'v_login'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function cek_login()
    {

        $loginValid = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($loginValid)) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $data_user = $this->ModelAuth->data_user($username, $password);
            $cekVerifikasi = $this->ModelAuth->cekVerifikasi($username);

            if ($data_user) {
                # code...
                if ($cekVerifikasi['status_verifikasi'] == 'Sudah Verifikasi') {

                    if ($data_user['role'] == 'Admin') {
                        $cek_admin = $this->ModelAuth->login_admin($username, $password);
                        if ($cek_admin) {
                            //jika data cocok
                            session()->set('id_user', $cek_admin['id_user']);
                            session()->set('nama', $cek_admin['nama_user']);
                            session()->set('email', $cek_admin['email']);
                            session()->set('username', $cek_admin['username']);
                            session()->set('role', $cek_admin['role']);
                            session()->set('foto', $cek_admin['foto']);

                            return redirect()->to(base_url('admin'));
                        } else {
                            //jika data tidak cocok
                            session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                            return redirect()->to(base_url('Auth/index'));
                        }
                    } else if ($data_user['role'] == 'Calon Siswa') {
                        $cek_calon_siswa = $this->ModelAuth->login_calon_siswa($username, $password);
                        if ($cek_calon_siswa) {
                            //jika data cocok
                            session()->set('id_user', $cek_calon_siswa['id_user']);
                            session()->set('nama', $cek_calon_siswa['nama_user']);
                            session()->set('email', $cek_calon_siswa['email']);
                            session()->set('username', $cek_calon_siswa['username']);
                            session()->set('role', $cek_calon_siswa['role']);
                            session()->set('foto', $cek_calon_siswa['foto']);

                            return redirect()->to(base_url('calonsiswa'));
                        } else {
                            //jika data tidak cocok
                            session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                            return redirect()->to(base_url('Auth/index'));
                        }
                    }
                } else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Anda Belum Verifikasi Email. Silahkan Cek Email Untuk Verifikasi Agar Bisa Login. Jika Tidak Ada Dipesan Utama Email, Maka Cek Juga Dipesan Spam Email!!!');
                    return redirect()->to(base_url('Auth/index'));
                }
            } else {
                //jika data tidak cocok
                session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                return redirect()->to(base_url('Auth/index'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/index'));
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar Akun',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'isi_auth'   => 'v_register'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function cek_register()
    {

        $registerValid = [
            'nama_user' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada.'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'repeatpassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'matches'  => '{field} harus sama dengan password.'
                ],
            ],
        ];

        if ($this->validate($registerValid)) {
            //jika valid

            $data = [
                'nama_user'         => $this->request->getPost('nama_user'),
                'email'             => $this->request->getPost('email'),
                'username'          => $this->request->getPost('username'),
                'password'          => $this->request->getPost('password'),
                'status_verifikasi' => 'Belum Verifikasi',
                'role'              => 'Calon Siswa'
            ];

            $emailUser = $this->request->getPost('email');

            // $cekEmail = $this->ModelAuth->cekEmail($emailUser);


            //send email
            $email = \Config\Services::email();

            $nama_user = $this->request->getPost('nama_user');
            $link = base_url('auth/verifikasiEmail/' . $emailUser);

            $fromEmail = 'anggarandhyalvian@gmail.com';
            $email->setFrom($fromEmail);
            $toFrom = $emailUser;
            $email->setTo($toFrom);

            $subject = 'Verifikasi Email';
            $email->setSubject($subject);

            // pesan tampilan di emailnya
            $body = "
                <h1 style='color: green;'>SDN Cibogo</h1>
                <p>Alamat : Kecamatan Cibogo, Kabupaten Subang</p>
                <h4>Hallo, $nama_user. Anda telah mendaftarkan akun di website PPDB SDN Cibogo. Agar bisa login Anda bisa klik tombol verifikasi dibawah!</h4>
                <br>
                <center><a style='background-color: green; color: white; border-radius:5px; padding: 7px 9px 7px 9px; font-size: 25px;' href=" . $link . "><b>Verifikasi Sekarang</b></a>
                <br>
                ";
            $message = $body;
            $email->setMessage($message);

            if (!$email->send()) {
                session()->setFlashdata('pesan', 'Email Gagal Dikirim. Mungkin Email Anda Tidak Aktif!!!');
                return redirect()->to(base_url('Auth/register'));
            } else {
                $this->ModelAuth->register($data);

                session()->setFlashdata('success', 'Selamat Akun Anda Sudah Terdaftar. Silahkan Cek Email Untuk Verifikasi Agar Bisa Login. Jika Tidak Ada Dipesan Utama Email, Maka Cek Juga Dipesan Spam Email!!!');
                return redirect()->to(base_url('Auth/index'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function verifikasiEmail($email)
    {
        $data = [
            'title' => 'Verifikasi Email',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'user'  => $this->ModelAuth->byEmail($email),
            'isi_auth' => 'v_verifikasi_email'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function ubahStatusVerifikasi($email)
    {
        // set status tahun akademik
        $data = [
            'email'             => $email,
            'status_verifikasi' => 'Sudah Verifikasi'
        ];

        $this->ModelAuth->ubahStatusVerifikasi($data);
        session()->setFlashdata('success', 'Selamat Anda Sekarang Bisa Login!!!');

        return redirect()->to(base_url('auth/index'));
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id_user');
        session()->remove('username');
        session()->remove('email');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('role');

        session()->setFlashdata('success', 'Logout Berhasil !!!');
        return redirect()->to(base_url('Auth/index'));
    }

    public function lupaAkun()
    {
        $data = [
            'title' => 'Form Lupa Password atau Username',
            'sekolah' => $this->ModelProfilSekolah->dataProfilSekolah(1),
            'isi_auth' => 'v_lupa_akun'
        ];
        return view('layout/v_wrapper_auth', $data);
    }

    public function prosesLupaAkun()
    {
        $emailUser = $this->request->getPost('email');

        $cekEmail = $this->ModelAuth->cekEmail($emailUser);

        if ($cekEmail) {
            //send email
            $email = \Config\Services::email();

            $nama_user = $cekEmail['nama_user'];
            $username = $cekEmail['username'];
            $password = $cekEmail['password'];

            $fromEmail = 'anggarandhyalvian@gmail.com';
            $email->setFrom($fromEmail);
            $toFrom = $emailUser;
            $email->setTo($toFrom);

            $subject = 'Lupa Akun';
            $email->setSubject($subject);

            // pesan tampilan di emailnya
            $body = "
            <h1 style='color: green;'>SDN Cibogo</h1>
            <p>Alamat : Kecamatan Cibogo, Kabupaten Subang</p>
            <h4>Hallo, $nama_user. Terima kasih sudah mengunjugngi website PPDB SDN Cibogo. Berikut Username dan Password Anda.</h4>
            <p>
            <table>
            <tr>
            <th>Username</th>
            <td>:</td>
            <td>$username</td>
            </tr>
            <tr>
            <th>Password</th>
            <td>:</td>
            <td>$password</td>
            </tr>
            </table>
            </p>
            ";
            $message = $body;
            $email->setMessage($message);

            if (!$email->send()) {
                session()->setFlashdata('pesan', 'Email Gagal Dikirim. Mungkin Email Anda Tidak Aktif!!!');
                return redirect()->to(base_url('Auth/lupaAkun'));
            } else {
                session()->setFlashdata('success', 'Kami Sudah Mengirim Username dan Password Ke Email Anda. Jika Tidak Ada Di Pesan Utama, Cek Di Spam Email!!!');
                return redirect()->to(base_url('Auth/lupaAkun'));
            }
        } else {
            //jika data tidak cocok
            session()->setFlashdata('pesan', 'Email Tidak Terdaftar. Anda Bisa Daftar Akun Terlebih Dahulu!!!');
            return redirect()->to(base_url('Auth/lupaAkun'));
        }
    }
}
