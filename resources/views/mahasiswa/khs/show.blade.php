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

                <h1 class="m-0">Detail KHS</h1>
                <br>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">KHS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if (!isset($khs->sudah_disetujui))
                        <div class="card-body">
                            <h1>Isi KHS semester {{ $khs->semester }} di
                                <a href="/khs/{{ $nim }}/{{ $khs->semester }}/edit">
                                    sini
                                </a>
                            </h1>
                        </div>
                        <div class="card-footer">
                            <a href="/khs/{{ $nim }}">Back</a>
                        </div>
                    @else
                        <form action="" method="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status Persetujuan</label>
                                    <input type="text" name="status" class="form-control" id="status"
                                        value="{{ $khs->statusPersetujuan() }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" name="semester" class="form-control" id="semester"
                                        value="{{ $khs->semester }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="sks_semester">SKS Semester Ini</label>
                                    <input type="text" name="sks_semester" class="form-control" id="sks_semester"
                                        value="{{ $khs->sks_semester }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="sks_kumulatif">SKS Kumulatif</label>
                                    <input type="text" name="sks_kumulatif" class="form-control" id="sks_kumulatif"
                                        value="{{ $khs->sks_kumulatif }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ip_semester">IP Semester Ini</label>
                                    <input type="text" name="ip_semester" class="form-control" id="ip_semester"
                                        value="{{ $khs->ip_semester }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ip_kumulatif">IP Kumulatif</label>
                                    <input type="text" name="ip_kumulatif" class="form-control" id="ip_kumulatif"
                                        value="{{ $khs->ip_kumulatif }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama_file">Scan KHS </label>
                                    <embed src="/storage/{{ $khs->nama_file }}" width="100%" height="600"
                                        type="application/pdf">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="/khs/{{ $nim }}">Back</a>
                            </div>
                        </form>
                    @endif
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
