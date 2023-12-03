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
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="/storage/{{ $user->mahasiswa->foto_profil }}"
                                alt="User Avatar">
                        </div>
                        <h3 class="info-box-text"><b>{{ $mahasiswa->nama }}</b></h3>
                        <h5 class="info-box-number"><b>NIM</b> {{ $mahasiswa->nim }} | Semester
                            {{ $mahasiswa->hitungSemester() }}</h5>
                    </div>
                </div><!-- /.container -->
            </div>
        </div>

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center"><a href="/mahasiswa/irs/{{ $mahasiswa->nim }}"> IRS Mahasiswa
                                        </a>
                                    </h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center"><a href="/mahasiswa/khs/{{ $mahasiswa->nim }}"> KHS Mahasiswa
                                        </a>
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
                                        <h5 class="text-center"><a href="/mahasiswa/pkl/{{ $mahasiswa->nim }}">Progres PKL Mahasiswa</a></h5>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                    @endif
                    @if ($mahasiswa->hitungSemester() >= 7)
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center">
                                        <a href="/mahasiswa/progres-skripsi/{{ $mahasiswa->nim }}">
                                            Progres
                                            Skripsi
                                            Mahasiswa
                                        </a>
                                    </h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    @endif
                    <div class="d-flex flex-wrap justify-content-center">
                        @for ($i = 1; $i <= 14; $i++)
                            <button type="button" class="btn btn-primary btn-lg mr-3" data-toggle="modal"
                                data-target="#smt-{{ $i }}" style="width: 207px; height: 75px;"
                                @if ($i <= $mahasiswa->hitungSemester()) enabled @else disabled @endif>
                                Semester {{ $i }}
                            </button>

                            <div class="modal fade" id="smt-{{ $i }}" tabindex="-1"
                                aria-labelledby="smt-{{ $i }}-modal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="smt-{{ $i }}-modal">Data Akademik
                                                Semester
                                                {{ $i }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $i }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($i % 5 == 0)
                    </div><br>
                    <div class="d-flex flex-wrap justify-content-center">
                        @endif
                        @endfor
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
