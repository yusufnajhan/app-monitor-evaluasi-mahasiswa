@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Rekap Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <h1 class="m-0">Rekap Mahasiswa per Tahun</h1>
                <br>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Mahasiswa
                        </h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">
                            Rekap Mahasiswa Informatika <br>
                            Fakultas Sains dan Matematika UNDIP Semarang
                        </h3>
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
                    </div>
                    <div class="card-footer">
                        <a href="/departemen/cetak-pdf-mahasiswa" class="btn btn-primary">
                            Cetak PDF
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                </div>
                <!-- /.card -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <br>
        <a href="/dashboard"
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Back
        </a>
    </div>
    </div>
@endsection
