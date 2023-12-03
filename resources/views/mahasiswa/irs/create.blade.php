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

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah IRS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/mahasiswa/simpan-irs" method="POST" enctype="multipart/form-data">
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
                                <label for="sks">Jumlah SKS yang diambil</label>
                                <input type="text" name="sks" class="form-control" id="sks"
                                    value="{{ old('sks') }}" min="2" max="24">
                                @error('sks')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan IRS </label>
                                <input type="file" name="nama_file" class="form-control-file" id="nama_file">
                                @error('nama_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="/mahasiswa/irs/{{ $mahasiswa->nim }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!-- /.container -->
        </div>
    </div>
@endsection
