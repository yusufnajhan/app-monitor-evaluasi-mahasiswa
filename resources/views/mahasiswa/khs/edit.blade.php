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
                            <li class="breadcrumb-item active">Form</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <div class="content">
            <div class="container">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">KHS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/mahasiswa/khs/{{ $nim }}/{{ $khs->semester }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="text" name="semester" class="form-control" id="semester"
                                    value="{{ $khs->semester }}" disabled>
                                @error('semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sks_semester">SKS Semester Ini</label>
                                <input type="text" name="sks_semester" class="form-control" id="sks_semester"
                                    value="{{ old('sks_semester', $khs->sks_semester) }}">
                                @error('sks_semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sks_kumulatif">SKS Kumulatif</label>
                                <input type="text" name="sks_kumulatif" class="form-control" id="sks_kumulatif"
                                    value="{{ old('sks_kumulatif', $khs->sks_kumulatif) }}">
                                @error('sks_kumulatif')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ip_semester">IP Semester Ini</label>
                                <input type="text" name="ip_semester" class="form-control" id="ip_semester"
                                    value="{{ old('ip_semester', $khs->ip_semester) }}">
                                @error('ip_semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ip_kumulatif">IP Kumulatif</label>
                                <input type="text" name="ip_kumulatif" class="form-control" id="ip_kumulatif"
                                    value="{{ old('ip_kumulatif', $khs->ip_kumulatif) }}">
                                @error('ip_kumulatif')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan KHS </label>
                                <input type="file" name="nama_file" class="form-control-file" id="nama_file">
                                @error('nama_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="/mahasiswa/khs/{{ $nim }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.row -->
@endsection
