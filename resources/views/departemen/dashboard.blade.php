@extends('layouts.main')

@section('user-name')
    @php
        $departemen = auth()->user()->departemen;
    @endphp
    {{ $departemen->nama }}

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Dashboard</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-navy">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="/storage/{{ $user->departemen->foto_profil }}"
                                alt="User Avatar">
                        </div>
                        <h3 class="info-box-text"><b>{{ $departemen->nama }}</b></h3>
                        <h5 class="info-box-number"><b>NIP</b> {{ $departemen->nip }}</h5>
                    </div>
                </div><!-- /.container -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    @if ($errors->any())
                        <div class="red-alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center">
                                        <a href="/departemen/rekap-pkl">Rekap PKL</a>
                                    </h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center">
                                        <a href="/departemen/rekap-skripsi">Rekap Skripsi</a>
                                    </h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center">
                                        <a href="/departemen/rekap-mahasiswa">Rekap Mahasiswa</a>
                                    </h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
@endsection
