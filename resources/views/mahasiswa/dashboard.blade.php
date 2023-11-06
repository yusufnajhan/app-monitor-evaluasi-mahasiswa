@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @php
                            $mahasiswa = auth()->user()->mahasiswa;
                        @endphp
                        <h1 class="m-0"> Hai {{ $mahasiswa->nama }}!</h1>
                        <h1 class="m-0"> Semester {{ $mahasiswa->hitungSemester() }}, semangka</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
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
                                <h5 class="text-center"><a href="/khs/{{ $mahasiswa->nim }}"> KHS Mahasiswa </a></h5>
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
                                    <h5 class="text-center"><a href="/progres-pkl/{{ $mahasiswa->nim }}">Progres PKL
                                            Mahasiswa</a></h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                @endif
                @if ($mahasiswa->hitungSemester() >= 7)
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/progres-skripsi/{{ $mahasiswa->nim }}">Progres Skripsi
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
