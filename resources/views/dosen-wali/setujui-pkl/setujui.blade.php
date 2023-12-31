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

                <h1 class="m-0">Detail PKL</h1>
                <br>

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">PKL</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if ($semester < 6)
                        <div class="card-body">
                            <h1>Mahasiswa belum memasuki masa PKL</h1>
                        </div>
                        <div class="card-footer">
                            <a href="/dosen-wali/detail-mahasiswa/{{ $nim }}">Back</a>
                        </div>
                    @else
                        @if (!isset($pkl->sudah_disetujui))
                            <div class="card-body">
                                <h1>Progres PKL belum diisi oleh mahasiswa
                                </h1>
                            </div>
                            <div class="card-footer">
                                <a href="/dosen-wali/detail-mahasiswa/{{ $nim }}">Back</a>
                            </div>
                        @else
                            <form action="/dosen-wali/progres-pkl/{{ $nim }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input type="text" name="semester" class="form-control" id="semester"
                                            value="{{ $pkl->semester }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="text" name="nilai" class="form-control" id="nilai"
                                            value="{{ $pkl->nilai }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_file">Scan Berita Acara PKL </label>
                                        <embed src="/storage/{{ $pkl->nama_file }}" width="100%" height="600"
                                            type="application/pdf">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if ($pkl->sudah_disetujui == 0)
                                        <button type="submit" name="sudah_disetujui" value="1">Setujui</button> |
                                    @else
                                        <button type="submit" name="sudah_disetujui" value="0">Batalkan
                                            Persetujuan</button> |
                                    @endif
                                    <a href="/dosen-wali/setujui-pkl">Back ke Persetujuan</a> |
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
@endsection
