<?php

use Illuminate\Support\Str;
use Pdo\Mysql;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection
    |--------------------------------------------------------------------------
    |
    | Database utama Laravel.
    | Dipakai untuk:
    | - tabel absensi
    | - migration
    | - session
    | - log aplikasi
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    */

    'connections' => [

        /*
        |--------------------------------------------------------------------------
        | DATABASE UTAMA APLIKASI ABSENSI
        |--------------------------------------------------------------------------
        |
        | Database lokal Laravel.
        | Contoh nama DB:
        | absensidr
        |
        */

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),

            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),

            'database' => env('DB_DATABASE', 'absensidr'),

            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),

            'unix_socket' => env('DB_SOCKET', ''),

            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),

            'prefix' => '',
            'prefix_indexes' => true,

            'strict' => true,
            'engine' => null,

            'options' => extension_loaded('pdo_mysql')
                ? array_filter([
                    (PHP_VERSION_ID >= 80500
                        ? Mysql::ATTR_SSL_CA
                        : PDO::MYSQL_ATTR_SSL_CA)
                    => env('MYSQL_ATTR_SSL_CA'),
                ])
                : [],
        ],

        /*
        |--------------------------------------------------------------------------
        | DATABASE SIMGOS
        |--------------------------------------------------------------------------
        |
        | Database master SIMGOS.
        | Dipakai untuk:
        | - data pegawai
        | - data dokter
        | - master data
        |
        */

        'simgos' => [
            'driver' => 'mysql',

            'host' => env('DB_SIMGOS_HOST', '10.10.11.200'),
            'port' => env('DB_SIMGOS_PORT', '3306'),

            'database' => env('DB_SIMGOS_DATABASE', 'master'),

            'username' => env('DB_SIMGOS_USERNAME', 'admin'),
            'password' => env('DB_SIMGOS_PASSWORD', 'S!MGos2@kemkes.go.id'),

            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',

            'prefix' => '',

            'strict' => true,
            'engine' => null,
        ],

        /*
        |--------------------------------------------------------------------------
        | DATABASE LOGIN USER
        |--------------------------------------------------------------------------
        |
        | Database aplikasi SIMGOS.
        | Dipakai khusus:
        | - login user
        | - validasi username/password
        |
        */

        'aplikasi' => [
            'driver' => 'mysql',

            'host' => env('DB_APLIKASI_HOST', '10.10.11.200'),
            'port' => env('DB_APLIKASI_PORT', '3306'),

            'database' => env('DB_APLIKASI_DATABASE', 'aplikasi'),

            'username' => env('DB_APLIKASI_USERNAME', 'admin'),
            'password' => env('DB_APLIKASI_PASSWORD', 'S!MGos2@kemkes.go.id'),

            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',

            'prefix' => '',

            'strict' => true,
            'engine' => null,
        ],

        /*
        |--------------------------------------------------------------------------
        | SQLITE
        |--------------------------------------------------------------------------
        |
        | Default bawaan Laravel.
        | Tidak dipakai, tapi biarkan saja.
        |
        */

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),

            'database' => env(
                'DB_DATABASE',
                database_path('database.sqlite')
            ),

            'prefix' => '',

            'foreign_key_constraints' => env(
                'DB_FOREIGN_KEYS',
                true
            ),

            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
            'transaction_mode' => 'DEFERRED',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [

            'cluster' => env('REDIS_CLUSTER', 'redis'),

            'prefix' => Str::slug(
                (string) env('APP_NAME', 'laravel')
            ) . '-database-',

            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [

            'url' => env('REDIS_URL'),

            'host' => env('REDIS_HOST', '127.0.0.1'),

            'username' => env('REDIS_USERNAME'),

            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),

            'database' => env('REDIS_DB', '0'),

            'max_retries' => env('REDIS_MAX_RETRIES', 3),

            'backoff_algorithm' => env(
                'REDIS_BACKOFF_ALGORITHM',
                'decorrelated_jitter'
            ),

            'backoff_base' => env(
                'REDIS_BACKOFF_BASE',
                100
            ),

            'backoff_cap' => env(
                'REDIS_BACKOFF_CAP',
                1000
            ),
        ],

        'cache' => [

            'url' => env('REDIS_URL'),

            'host' => env('REDIS_HOST', '127.0.0.1'),

            'username' => env('REDIS_USERNAME'),

            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),

            'database' => env('REDIS_CACHE_DB', '1'),

            'max_retries' => env('REDIS_MAX_RETRIES', 3),

            'backoff_algorithm' => env(
                'REDIS_BACKOFF_ALGORITHM',
                'decorrelated_jitter'
            ),

            'backoff_base' => env(
                'REDIS_BACKOFF_BASE',
                100
            ),

            'backoff_cap' => env(
                'REDIS_BACKOFF_CAP',
                1000
            ),
        ],

    ],

];
