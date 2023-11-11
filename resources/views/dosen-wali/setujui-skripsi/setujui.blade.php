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

                <h1 class="m-0">Detail skripsi</h1>
                <br>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">skripsi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if ($semester < 7)
                        <div class="card-body">
                            <h1>Mahasiswa belum memasuki masa skripsi</h1>
                        </div>
                        <div class="card-footer">
                            <a href="/dosen-wali/detail-mahasiswa/{{ $nim }}">Back</a>
                        </div>
                    @else
                        @if (!isset($skripsi->sudah_disetujui))
                            <div class="card-body">
                                <h1>Progres skripsi belum diisi oleh mahasiswa
                                </h1>
                            </div>
                            <div class="card-footer">
                                <a href="/dosen-wali/detail-mahasiswa/{{ $nim }}">Back</a>
                            </div>
                        @else
                            <form action="/dosen-wali/progres-skripsi/{{ $nim }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="semester_tempuh">Semester Tempuh</label>
                                        <input type="text" name="semester_tempuh" class="form-control"
                                            id="semester_tempuh" value="{{ $skripsi->semester }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="text" name="nilai" class="form-control" id="nilai"
                                            value="{{ $skripsi->nilai }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_sidang">Tanggal Sidang</label>
                                        <input type="text" name="tanggal_sidang" class="form-control" id="tanggal_sidang"
                                            value="{{ $skripsi->tanggal_sidang }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_file">Scan Berita Acara skripsi </label>
                                        <embed src="/storage/{{ $skripsi->nama_file }}" width="100%" height="600"
                                            type="application/pdf">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if ($skripsi->sudah_disetujui == 0)
                                        <button type="submit" name="sudah_disetujui" value="1">Setujui</button> |
                                        <a href="/dosen-wali/progres-skripsi/{{ $nim }}/edit">Edit</a> |
                                    @else
                                        <button type="submit" name="sudah_disetujui" value="0">Batalkan
                                            Persetujuan</button>
                                    @endif
                                    <a href="/dashboard">Back</a>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
                <!-- /.card -->
            </div><!-- /.row -->


        </div><!-- /.container-fluid -->
        <br>
        <a href="/dashboard" class="">
            Back
        </a>
    </div>
    </div>
@endsection
