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
                    <form action="/isi-data/{{ $mahasiswa->nim }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" class="form-control" id="nim"
                                    value="{{ $mahasiswa->nim }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $mahasiswa->user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" id="angkatan"
                                    value="{{ $mahasiswa->angkatan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" id="status"
                                    value="{{ $mahasiswa->status }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="dosen_wali">Dosen Wali</label>
                                <input type="text" name="dosen_wali" class="form-control" id="dosen_wali"
                                    value="{{ $mahasiswa->dosenWali->nama }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukkan Nama Lengkap" value="{{ old('nama', $mahasiswa->nama) }}">
                            </div>
                            <div class="form-group">
                                <label for="jalur_masuk">Jalur Masuk</label>
                                <select type="text" name="jalur_masuk" class="form-control" id="jalur_masuk">
                                    <option value="" selected disabled>-- Pilih Jalur Masuk --</option>
                                    <option value="SNMPTN" {{ old('jalur_masuk') === 'SNMPTN' ? 'selected' : '' }}>SNMPTN
                                    </option>
                                    <option value="SBMPTN" {{ old('jalur_masuk') === 'SBMPTN' ? 'selected' : '' }}>SBMPTN
                                    </option>
                                    <option value="Mandiri" {{ old('jalur_masuk') === 'Mandiri' ? 'selected' : '' }}>
                                        Mandiri</option>
                                    <option value="Lainnya" {{ old('jalur_masuk') === 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                    value="{{ old('no_telepon') }}" maxlength="13">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control" onchange="getKabupaten()">
                                    <option value="" selected disabled>-- Pilih Provinsi --
                                    </option>
                                    @foreach ($provinsi as $itemProvinsi)
                                        <option value="{{ $itemProvinsi->kode_prov }}">{{ $itemProvinsi->nama_prov }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <select name="kota" id="kota" class="form-control">
                                    <option value="" selected disabled>-- Pilih Kota/Kabupaten --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ old('alamat') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    id="confirm_password">
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
        function getKabupaten() {
            const provinsi = document.getElementById('provinsi').value;

            $.ajax({
                url: '/kabupaten',
                method: 'get',
                data: {
                    kode_prov: provinsi,
                },
                success: function(data) {
                    document.getElementById('kota').innerHTML = '';
                    let option = document.createElement('option');
                    option.value = '';
                    option.text = '-- Pilih Kota/Kabupaten --';
                    document.getElementById('kota').appendChild(option);

                    for (const kabupaten of data) {
                        const option = document.createElement('option');
                        option.value = kabupaten.kode_kab;
                        option.text = kabupaten.nama_kab;
                        document.getElementById('kota').appendChild(option);
                    }
                }
            })
        }
    </script>
@endsection
