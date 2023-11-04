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


                <h1 class="m-0">IRS Mahasiswa</h1>
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
                        <h3 class="card-title">IRS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <table>
                        <thead>
                            <tr>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Status Persetujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($irs as $itemIrs)
                                <tr>
                                    <td>{{ $itemIrs->semester }}</td>
                                    <td>{{ $itemIrs->sks ? $itemIrs->sks : 'Kosong' }}</td>
                                    <td>
                                        {{ $itemIrs->statusPersetujuan() }}
                                    </td>
                                    <td>
                                        <a href="/irs/{{ $nim }}/{{ $itemIrs->semester }}">Detail</a>
                                        <a href="/irs/{{ $nim }}/{{ $itemIrs->semester }}/edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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