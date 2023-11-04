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
                    <form action="/progres-pkl/{{ $nim }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <option value="" selected disabled>-- Pilih Status --</option>
                                    <option value="Belum Ambil"
                                        {{ old('status', $pkl->status) == 'Belum Ambil' ? 'selected' : '' }}>Belum
                                        Ambil</option>
                                    <option value="Sedang Ambil"
                                        {{ old('status', $pkl->status) == 'Sedang Ambil' ? 'selected' : '' }}>
                                        Sedang Ambil</option>
                                    <option value="Lulus" {{ old('status', $pkl->status) == 'Lulus' ? 'selected' : '' }}>
                                        Lulus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="text" name="nilai" class="form-control" id="nilai"
                                    value="{{ $pkl->nilai }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama_file">Scan KHS </label>
                                <input type="file" name="nama_file" class="form-control" id="nama_file" disabled>
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const nilaiInput = document.getElementById('nilai');
            const namaFileInput = document.getElementById('nama_file');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value == 'Lulus') {
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
