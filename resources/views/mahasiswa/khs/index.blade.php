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
                            <li class="breadcrumb-item active">KHS</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <h1 class="m-0">KHS Mahasiswa</h1>
                <br>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="/mahasiswa/isi-khs" class="btn btn-primary mb-2" style="width: 100px;">
                    Isi KHS
                </a>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- form start -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>SKS Semester</th>
                                    <th>IP Semester</th>
                                    <th>Status Persetujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khs as $itemKhs)
                                    <tr>
                                        <td>{{ $itemKhs->semester }}</td>
                                        <td>{{ $itemKhs->sks_semester ? $itemKhs->sks_semester : 'Kosong' }}</td>
                                        <td>{{ $itemKhs->ip_semester ? $itemKhs->ip_semester : 'Kosong' }}</td>
                                        <td>
                                            {{ $itemKhs->statusPersetujuan() }}
                                        </td>
                                        <td>
                                            <a href="/mahasiswa/khs/{{ $nim }}/{{ $itemKhs->semester }}"
                                                class="btn btn-primary mr-3">
                                                Detail
                                            </a>
                                            @if ($itemKhs->sudah_disetujui == 0)
                                                <a href="/mahasiswa/khs/{{ $nim }}/{{ $itemKhs->semester }}/edit"
                                                    class="btn btn-warning">
                                                    Edit
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="/dashboard" class="btn btn-secondary">
                    Back
                </a>
                <!-- /.card -->
                <br>
            </div><!-- /.container -->
        </div>
    </div>
@endsection
