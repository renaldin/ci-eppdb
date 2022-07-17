<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filtercalonsiswa' => \App\Filters\filtercalonsiswa::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'landing', 'landing/*',
                '/',
                '/landing/*',
                // auth
                '/auth/login',
                '/auth/register',
                '/auth/verifikasiEmail',
                '/auth/lupaAkun',
            ]],
            'filtercalonsiswa' => ['except' => [
                'auth', 'auth/*',
                'landing', 'landing/*',
                '/',
                '/landing/*',
                // auth
                '/auth/login',
                '/auth/register',
                '/auth/verifikasiEmail',
                '/auth/lupaAkun',
            ]]
        ],
        'after' => [
            'filteradmin' => ['except' => [
                'admin', 'admin/*',
                'landing', 'landing/*',
                'informasi', 'informasi/*',
                'profil_sekolah', 'profil_sekolah/*',
                'tahun_ajaran', 'tahun_ajaran/*',
                'user', 'user/*',
                'daftar', 'daftar/*',
                'user', 'user/*',
                // 'profil', 'profil/*',
                '/',
                '/landing/*',
                '/auth/logout',
                '/profil/*',
                '/informasi', '/informasi/*',
                '/profilSekolah',
                '/tahunAjaran', '/tahunAjaran/*',
                '/daftar', '/daftar/*',
                '/laporan', '/laporan/*',
                '/pengguna', '/pengguna/*',
            ]],
            'filtercalonsiswa' => ['except' => [
                'calonsiswa', 'calonsiswa/*',
                'landing', 'landing/*',
                'profil', 'profil/*',
                'formulir_pendaftaran', 'formulir_pendaftaran/*',
                'pengumuman', 'pengumuman/*',
                '/',
                '/landing/*',
                '/auth/logout',
                '/profil/*',
                '/formulirPendaftaran', '/formulirPendaftaran/*',
                '/pengumuman', '/pengumuman/*',
            ]],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
