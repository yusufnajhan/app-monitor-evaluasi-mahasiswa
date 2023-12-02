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
                            <li class="breadcrumb-item active">Daftar Mahasiswa per Angkatan dan Status</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <h1 class="m-0">Daftar Mahasiswa yang Sudah Skripsi</h1>
                <br>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Skripsi</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">
                            Daftar Mahasiswa Angkatan {{ $tahun }} Status {{ $status }} <br>
                            Departemen Informatika Fakultas Sains dan Matematika UNDIP Semarang
                        </h3>
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
                    </div>
                    <div class="card-footer">
                        <a href="/departemen/cetak-mahasiswa-tahun-{{ $tahun }}-status-{{ $status }}"
                            class="btn btn-primary">
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
