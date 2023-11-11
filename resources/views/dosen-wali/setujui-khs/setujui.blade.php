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
                            <li class="breadcrumb-item active">khs</li>
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
                    @if (!isset($khs->sks_semester))
                        <div class="card-body">
                            <h1>KHS belum diisi mahasiswa
                            </h1>
                        </div>
                        <div class="card-footer">
                            <a href="/dosen-wali/khs/{{ $mahasiswa->nim }}">Back</a>
                        </div>
                    @else
                        <form action="/dosen-wali/khs/{{ $mahasiswa->nim }}/{{ $khs->semester }}" method="POST"
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
                                    <label for="sks_semester">SKS Semester</label>
                                    <input type="text" name="sks_semester" class="form-control" id="sks_semester"
                                        value="{{ $khs->sks_semester }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="sks_kumulatif">SKS Kumulatif</label>
                                    <input type="text" name="sks_kumulatif" class="form-control" id="sks_kumulatif"
                                        value="{{ $khs->sks_kumulatif }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ip_semester">IP Semester</label>
                                    <input type="text" name="ip_semester" class="form-control" id="ip_semester"
                                        value="{{ $khs->ip_semester }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ip_kumulatif">IP Kumulatif</label>
                                    <input type="text" name="ip_kumulatif" class="form-control" id="ip_kumulatif"
                                        value="{{ $khs->ip_kumulatif }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama_file">Scan khs </label>
                                    <embed src="/storage/{{ $khs->nama_file }}" width="100%" height="600"
                                        type="application/pdf">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                @if ($khs->sudah_disetujui == 0)
                                    <button type="submit" name="sudah_disetujui" value="1">Setujui</button> |
                                @else
                                    <button type="submit" name="sudah_disetujui" value="0">Batalkan
                                        Persetujuan</button>|
                                @endif
                                <a href="/dosen-wali/setujui-khs">Back To Persetujuan</a> |
                                <a href="/dosen-wali/khs/{{ $mahasiswa->nim }}">Back</a>
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
@endsection
