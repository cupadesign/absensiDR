<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <card>
        <h2>Data Absensi dr</h2>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </card>
    <card>
        <h2>Tugas Absensi</h2>
        <p>Ruangan yang harus di visite: 90% (belum selesai)</p>
        <p>Pasien saya: 15 pasien (belum selesai)</p>
        <card>
            <h3>Ruangan yang harus divisite</h3>
            <section>
                <p>Ruangan 1 <button>Buka</button></p>
                <p>Ruangan 2 <button>Buka</button></p>
                <p>Ruangan 3 <button>Buka</button></p>
            </section>
        </card>
        <card>
            <h3>Pasien Ruangan: Jade</h3>
            <section>
                <h4>List Pasien</h4>
                <div>
                    <p>Nama Pasien: Surianingsih <button>visite</button></p>
                    <div>
                        <p>Usia: 45 tahun</p>
                        <p>Jenis Kelamin: Perempuan</p>
                        <p>Diagnosa: Diabetes Mellitus</p>
                        <p>Riwayat Penyakit: Hipertensi, Obesitas</p>
                        <p>Obat yang Diberikan: Metformin, Lisinopril</p>
                    </div>
                </div>
                <div>
                    <p>Nama Pasien: Siti Nurjanah <button>visite</button></p>
                    <div>
                        <p>Usia: 45 tahun</p>
                        <p>Jenis Kelamin: Perempuan</p>
                        <p>Diagnosa: Diabetes Mellitus</p>
                        <p>Riwayat Penyakit: Hipertensi, Obesitas</p>
                        <p>Obat yang Diberikan: Metformin, Lisinopril</p>
                    </div>
                </div>
            </section>
    </card>
</html>
