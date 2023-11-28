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
                            <li class="breadcrumb-item active">Ubah Data Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <h1 class="m-0">Ubah Status Mahasiswa</h1>
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
                    <div class="card-body p-0">
                        <!-- form start -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->angkatan }}</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control status-dropdown" data-nim={{ $mhs->nim }}
                                                    name="status">
                                                    <option value="Aktif" {{ $mhs->status == 'Aktif' ? 'selected' : '' }}>
                                                        Aktif
                                                    </option>
                                                    <option value="Cuti" {{ $mhs->status == 'Cuti' ? 'selected' : '' }}>
                                                        Cuti
                                                    </option>
                                                    <option value="Mangkir"
                                                        {{ $mhs->status == 'Mangkir' ? 'selected' : '' }}>
                                                        Mangkir
                                                    </option>
                                                    <option value="DO" {{ $mhs->status == 'DO' ? 'selected' : '' }}>
                                                        DO
                                                    </option>
                                                    <option value="Undur Diri"
                                                        {{ $mhs->status == 'Undur Diri' ? 'selected' : '' }}>
                                                        Undur Diri
                                                    </option>
                                                    <option value="Lulus" {{ $mhs->status == 'Lulus' ? 'selected' : '' }}>
                                                        Lulus
                                                    </option>
                                                    <option value="Meninggal Dunia"
                                                        {{ $mhs->status == 'Meninggal Dunia' ? 'selected' : '' }}>
                                                        Meninggal Dunia
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
                <!-- /.card -->
                <br>
                <a href="/dashboard"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-primary rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Back
                </a>
            </div><!-- /.container -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.status-dropdown').change(function() {
                let selectedStatus = $(this).val();
                let nim = $(this).data('nim');

                $.ajax({
                    url: '/operator/update-status-mahasiswa',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nim: nim,
                        status: selectedStatus
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
