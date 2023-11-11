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
                        <h3 class="card-title">skripsi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/dosen-wali/progres-skripsi/{{ $nim }}/update-dan-setujui" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <option value="" selected disabled>-- Pilih Status --</option>
                                    <option value="Belum Ambil"
                                        {{ old('status', $skripsi->status) == 'Belum Ambil' ? 'selected' : '' }}>Belum
                                        Ambil</option>
                                    <option value="Sedang Ambil"
                                        {{ old('status', $skripsi->status) == 'Sedang Ambil' ? 'selected' : '' }}>
                                        Sedang Ambil</option>
                                    <option value="Lulus"
                                        {{ old('status', $skripsi->status) == 'Lulus' ? 'selected' : '' }}>
                                        Lulus</option>
                                </select>
                            </div>
                            <div id="visible-when-lulus" hidden>
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" class="form-control" id="nilai"
                                        value="{{ old('nilai', $skripsi->nilai) }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_sidang">Tanggal Sidang</label>
                                    <input type="date" name="tanggal_sidang" class="form-control" id="tanggal_sidang"
                                        value="{{ old('tanggal_sidang', $skripsi->tanggal_sidang) }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_file">Scan Berita Acara skripsi </label>
                                    <embed src="/storage/{{ $skripsi->nama_file }}" width="100%" height="600"
                                        type="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/dashboard">Back to Dashboard</a>
                            <a href="/dosen-wali/progres-skripsi/{{ $nim }}"></a>
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
            const inputSaatLulus = document.getElementById('visible-when-lulus');
            // const namaFileInput = document.getElementById('nama_file');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'Lulus') {
                    inputSaatLulus.hidden = false;
                } else {
                    inputSaatLulus.hidden = true;
                }
            });
        });
    </script>
@endsection
