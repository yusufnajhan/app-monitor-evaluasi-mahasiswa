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
                    <form action="" method="" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status_persetujuan">Status Persetujuan</label>
                                <input type="text" name="status_persetujuan" class="form-control" id="status_persetujuan"
                                    value="{{ $pkl->statusPersetujuan() }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Persetujuan</label>
                                <input type="text" name="status" class="form-control" id="status"
                                    value="{{ $pkl->status }}" disabled>
                            </div>
                            @if ($pkl->status == 'Lulus')
                                <div class="form-group">
                                    <label for="nilai">Status Persetujuan</label>
                                    <input type="text" name="nilai" class="form-control" id="nilai"
                                        value="{{ $pkl->nilai }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama_file">Scan Berita Acara PKL </label>
                                    <embed src="/storage/{{ $pkl->nama_file }}" width="100%" height="600"
                                        type="application/pdf">
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="/khs/{{ $nim }}">Back</a>
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
