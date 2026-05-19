<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    @php
        use Illuminate\Support\Facades\DB;

        $data = DB::connection('aplikasi')
            ->table('pengguna')
            ->get();
    @endphp

    <h1>LOGIN ABSENSI</h1>

    <p>Jumlah data pegawai:
        {{ count($data) }}
    </p>

    <form action="/login" method="POST">
        @csrf

        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">

        <button type="submit">Login</button>
    </form>

</body>
</html>
