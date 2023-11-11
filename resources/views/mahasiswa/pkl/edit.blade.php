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
                        <h3 class="card-title">PKL</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/mahasiswa/progres-pkl/{{ $nim }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" class="form-control" id="semester"
                                    value="{{ old('semester') }}" min="6" max="14">
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" name="nilai" class="form-control" id="nilai"
                                    value="{{ old('nilai') }}" min="0" max="100">
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan Berita Acara PKL </label>
                                <input type="file" name="nama_file" class="form-control" id="nama_file">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/dashboard">Back to Dashboard</a>
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const nilaiInput = document.getElementById('nilai');
            const namaFileInput = document.getElementById('nama_file');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'Lulus') {
                    nilaiInput.disabled = false;
                    namaFileInput.disabled = false;
                } else {
                    nilaiInput.disabled = true;
                    namaFileInput.disabled = true;
                }
            });
        });
    </script>
@endsection
