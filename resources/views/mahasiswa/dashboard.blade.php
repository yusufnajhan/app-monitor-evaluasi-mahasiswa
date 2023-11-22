@extends('layouts.main')
@section('user-name')
    @php
        $mahasiswa = auth()->user()->mahasiswa;
    @endphp 
    {{ $mahasiswa->nama }}

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3> Dashboard </h3>
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
                    <div class="widget-user-image"> <img class="img-circle elevation-2" src="public/lte/dist/img/user.jpg" alt="User Avatar">
                </div>
                    <h3 class="info-box-text"><b>{{ $mahasiswa->nama }}</b></h3>
                    <h5 class="info-box-number"><b>NIM</b> {{ $mahasiswa->nim}} | Semester {{ $mahasiswa->hitungSemester() }}</h5>
                </div>
            </div><!-- /.container -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/mahasiswa/irs/{{ $mahasiswa->nim }}"> IRS Mahasiswa </a>
                                </h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/mahasiswa/khs/{{ $mahasiswa->nim }}"> KHS Mahasiswa </a>
                                </h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
                @if ($mahasiswa->hitungSemester() >= 6)
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center"><a href="/mahasiswa/progres-pkl/{{ $mahasiswa->nim }}">Progres
                                            PKL
                                            Mahasiswa</a></h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                @endif
                @if ($mahasiswa->hitungSemester() >= 7)
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/mahasiswa/progres-skripsi/{{ $mahasiswa->nim }}">Progres
                                        Skripsi
                                        Mahasiswa</a></h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@endsection
