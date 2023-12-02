<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Rekap Mahasiswa</title>
</head>

<body class="align-items-center justify-content-center">
    <div class="text-center">
        <h3>
            Rekap Mahasiswa Informatika <br>
            Fakultas Sains dan Matematika UNDIP Semarang
        </h3>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">Status</th>
                @for ($year = now()->year - 6; $year <= now()->year; $year++)
                    <th scope="col">{{ $year }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @inject('mahasiswa', 'App\Http\Controllers\RekapMahasiswaOlehDepartemenController')
            @foreach (['Aktif', 'Cuti', 'Mangkir', 'DO', 'Undur Diri', 'Lulus', 'Meninggal Dunia'] as $status)
                <tr>
                    <td>{{ $status }}</td>
                    @for ($year = now()->year - 6; $year <= now()->year; $year++)
                        <td>{{ $mahasiswa->mahasiswaByYearAndStatus($year, $status) }}</td>
                    @endfor
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
