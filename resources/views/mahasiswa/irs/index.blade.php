@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">IRS</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <h1 class="m-0">IRS Mahasiswa</h1>
                <br>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="/mahasiswa/isi-irs" class="btn btn-primary mb-2" style="width: 100px;">
                    Isi IRS
                </a>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- form start -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>SKS</th>
                                    <th>Status Persetujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($irs as $itemIrs)
                                    <tr>
                                        <td>{{ $itemIrs->semester }}</td>
                                        <td>{{ $itemIrs->sks ? $itemIrs->sks : 'Kosong' }}</td>
                                        <td>
                                            {{ $itemIrs->statusPersetujuan() }}
                                        </td>
                                        <td>
                                            <a href="/mahasiswa/irs/{{ $nim }}/{{ $itemIrs->semester }}"
                                                class="btn btn-primary mr-3">
                                                Detail
                                            </a>
                                            @if ($itemIrs->sudah_disetujui == 0)
                                                <a href="/mahasiswa/irs/{{ $nim }}/{{ $itemIrs->semester }}/edit"
                                                    class="btn btn-warning mr-3">
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
