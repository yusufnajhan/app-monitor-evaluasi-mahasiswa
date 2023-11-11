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
                            <li class="breadcrumb-item active">skripsi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <h1 class="m-0">skripsi Mahasiswa yang Belum Disetujui</h1>
                <br>

                @if ($errors->any())
                    <div class="red-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- form start -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Semester</th>
                                    {{-- <th>Status Persetujuan</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skripsi as $itemSkripsi)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $itemSkripsi->mahasiswa->nim }}</td>
                                        <td>{{ $itemSkripsi->mahasiswa->nama }}</td>
                                        <td>{{ $itemSkripsi->semester }}</td>
                                        {{-- <td>{{ $itemSkripsi->sks ? $itemSkripsi->sks : 'Kosong' }}</td> --}}
                                        {{-- <td>
                                            {{ $itemSkripsi->statusPersetujuan() }}
                                        </td> --}}
                                        <td>
                                            <a
                                                href="/dosen-wali/progres-skripsi/{{ $itemSkripsi->mahasiswa->nim }}/setujui">Setujui</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
                <br>
                <a href="/dashboard" class="">
                    Back
                </a>
            </div><!-- /.container -->
        </div>
    </div>
@endsection
