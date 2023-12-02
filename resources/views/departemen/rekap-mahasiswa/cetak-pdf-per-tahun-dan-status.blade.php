<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Sudah Lulus Skripsi Angkatan {{ $tahun }}</title>
</head>

<body class="align-items-center justify-content-center">
    <div class="text-center">
        <h3>
            Daftar Mahasiswa Angkatan {{ $tahun }} Status {{ $status }} <br>
            Departemen Informatika Fakultas Sains dan Matematika UNDIP Semarang
        </h3>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Status</th>
                <th scope="col">Jalur Masuk</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Kota</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->angkatan }}</td>
                    <td>{{ $mhs->status }}</td>
                    <td>{{ $mhs->jalur_masuk }}</td>
                    <td>{{ $mhs->no_telepon }}</td>
                    <td>{{ $mhs->getNamaProvinsi() }}</td>
                    <td>{{ $mhs->getNamaKabupaten() }}</td>
                    <td>{{ $mhs->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
