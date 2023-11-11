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

                <h1 class="m-0">Edit KHS</h1>
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
                            </div>
                            <div class="form-group">
                                <label for="sks_semester">SKS Semester Ini</label>
                                <input type="text" name="sks_semester" class="form-control" id="sks_semester"
                                    value="{{ old('sks_semester', $khs->sks_semester) }}">
                            </div>
                            <div class="form-group">
                                <label for="sks_kumulatif">SKS Kumulatif</label>
                                <input type="text" name="sks_kumulatif" class="form-control" id="sks_kumulatif"
                                    value="{{ old('sks_kumulatif', $khs->sks_kumulatif) }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_semester">IP Semester Ini</label>
                                <input type="text" name="ip_semester" class="form-control" id="ip_semester"
                                    value="{{ old('ip_semester', $khs->ip_semester) }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_kumulatif">IP Kumulatif</label>
                                <input type="text" name="ip_kumulatif" class="form-control" id="ip_kumulatif"
                                    value="{{ old('ip_kumulatif', $khs->ip_kumulatif) }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan KHS </label>
                                <input type="file" name="nama_file" class="form-control" id="nama_file">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
