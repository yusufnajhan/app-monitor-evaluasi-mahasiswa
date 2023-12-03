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
                            <li class="breadcrumb-item active">IRS</li>
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
                        <h3 class="card-title">Tambah KHS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/mahasiswa/simpan-khs" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="form-control">
                                    @for ($smt = 1; $smt <= $mahasiswa->hitungSemester(); $smt++)
                                        <option value="{{ $smt }}"
                                            @if (old('semester') == $smt) selected @endif>
                                            {{ $smt }}
                                        </option>
                                    @endfor
                                </select>
                                @error('semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sks_semester">SKS Semester Ini</label>
                                <input type="text" name="sks_semester" class="form-control" id="sks_semester"
                                    value="{{ old('sks_semester') }}">
                                @error('sks_semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sks_kumulatif">SKS Kumulatif</label>
                                <input type="text" name="sks_kumulatif" class="form-control" id="sks_kumulatif"
                                    value="{{ old('sks_kumulatif') }}">
                                @error('sks_kumulatif')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ip_semester">IP Semester Ini</label>
                                <input type="text" name="ip_semester" class="form-control" id="ip_semester"
                                    value="{{ old('ip_semester') }}">
                                @error('ip_semester')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ip_kumulatif">IP Kumulatif</label>
                                <input type="text" name="ip_kumulatif" class="form-control" id="ip_kumulatif"
                                    value="{{ old('ip_kumulatif') }}">
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
                            <a href="/mahasiswa/khs/{{ $mahasiswa->nim }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.row -->
    <!-- /.container-fluid -->
@endsection
