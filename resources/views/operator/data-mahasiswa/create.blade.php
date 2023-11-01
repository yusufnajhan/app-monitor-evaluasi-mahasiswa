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
    
          
            <h1 class="m-0">Tambah Data Mahasiswa</h1>
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
                <h3 class="card-title">Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/tambah-mahasiswa" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM" value="{{ old('nim') }}"  >
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                  </div>
                  <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <select name="angkatan" class="form-control" id="angkatan">
                        <option value="" selected disabled>-- Pilih Angkatan --</option>
                        @for ($year = now()->year - 6; $year <= now()->year; $year++) 
                          <option value="{{ $year }}" {{ old('angkatan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                    <option value="" selected disabled>-- Pilih Status --</option>
                        <option value="Aktif" {{ old('status') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ old('status') === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dosen_wali">Dosen Wali</label>
                    <select name="dosen_wali" id="dosen_wali" class="form-control">
                      <option value="" selected disabled>-- Pilih Dosen Wali --</option>
                      @foreach ($allDosenWali as $dosenWali)
                          <option value="{{ $dosenWali->id }}">{{ $dosenWali->nama }}</option>
                      @endforeach
                    </select>
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
