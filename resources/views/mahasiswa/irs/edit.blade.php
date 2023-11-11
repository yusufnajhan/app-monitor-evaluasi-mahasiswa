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
                    <div class="card-header">
                        <h3 class="card-title">Edit IRS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/mahasiswa/irs/{{ $nim }}/{{ $irs->semester }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="text" name="semester" class="form-control" id="semester"
                                    value="{{ $irs->semester }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS yang diambil</label>
                                <input type="text" name="sks" class="form-control" id="sks"
                                    value="{{ old('sks', $irs->sks) }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan IRS </label>
                                <input type="file" name="nama_file" class="form-control" id="nama_file">
                            </div>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button> |
                            <a href="/mahasiswa/irs/{{ $nim }}">Back</a>
                        </div>
                    </form>
                </div><!-- /.card -->
                <br>
                <a href="/dashboard" class="">
                    Back
                </a>
            </div><!-- /.container -->
        </div>
    </div>
@endsection
