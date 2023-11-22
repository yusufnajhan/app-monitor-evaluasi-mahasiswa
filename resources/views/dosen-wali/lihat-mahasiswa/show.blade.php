@extends('layouts.main')

@section('user-name')
    @php
        $dosen = auth()->user()->dosenWali;
    @endphp 
    {{ $dosen->nama }}

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3> Progress Perkembangan Mahasiswa </h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dosen-wali/daftar-mahasiswa">IRS</a></li>
                            <li class="breadcrumb-item active">Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-navy">
                    <div class="widget-user-image"> <img class="img-circle elevation-2" src="public/lte/dist/img/user.jpg" alt="User Avatar">
                </div>
                    <h3 class="info-box-text"><b>{{ $mahasiswa->nama }}</b></h3>
                    <h5 class="info-box-number"><b>NIM</b> {{ $mahasiswa->nim }} | Semester {{ $mahasiswa->hitungSemester() }} </h5>
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
                                <h5 class="text-center"><a href="/dosen-wali/irs/{{ $mahasiswa->nim }}"> IRS Mahasiswa </a>
                                </h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/dosen-wali/khs/{{ $mahasiswa->nim }}"> KHS Mahasiswa </a>
                                </h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
                @if ($mahasiswa->hitungSemester() >= 6)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/dosen-wali/progres-pkl/{{ $mahasiswa->nim }}">Progres
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
                                <h5 class="text-center"><a href="/dosen-wali/progres-skripsi/{{ $mahasiswa->nim }}">Progres
                                        Skripsi
                                        Mahasiswa</a></h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                @endif
                </div>

                @for ($i = 1; $i <= $mahasiswa->hitungSemester(); $i++)
                    {{-- @php
                        $irs = IsianRencanaSemester::where('semester', $i)
                            ->where('mahasiswa_id', $mahasiswa->id)
                            ->first();
                        $khs = KartuHasilStudi::where('semester', $i)
                            ->where('mahasiswa_id', $mahasiswa->id)
                            ->first();
                    @endphp --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#smt-{{ $i }}">
                                        Semester {{ $i }}
                                    </button>
                        
                                    <!-- Modal -->
                                    <div class="modal fade" id="smt-{{ $i }}" tabindex="-1"
                                        aria-labelledby="smt-{{ $i }}-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="smt-{{ $i }}-modal">Data Akademik Semester {{ $i }} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <b>IRS</b><br>
                                                    SKS {{ $irs[$i - 1]->sks }} <br>
                                                    <embed src="/storage/{{ $irs[$i - 1]->nama_file }}" width="100%" height="200"
                                                        type="application/pdf">
                                                    <br>
                                                    <b>KHS</b><br>
                                                    SKS {{ $khs[$i - 1]->sks_semester }} <br>
                                                    SKS Kumulatif {{ $khs[$i - 1]->sks_kumulatif }} <br>
                                                    IP Semester {{ $khs[$i - 1]->ip_semester }} <br>
                                                    IP Kumulatif {{ $khs[$i - 1]->ip_kumulatif }} <br>
                                                    <embed src="/storage/{{ $khs[$i - 1]->nama_file }}" width="100%" height="200"
                                                        type="application/pdf">

                                                    @if ($i == $pkl->semester)
                                                        @if (isset($pkl->semester))
                                                            {{ $pkl->semester }} <br>
                                                            {{ $pkl->nilai }} <br>
                                                            <embed src="/storage/{{ $pkl->nama_file }}" width="100%" height="200"
                                                                type="application/pdf">
                                                        @endif
                                                    @endif

                                                    @if ($i == $skripsi->semester)
                                                        @if (isset($skripsi->semester))
                                                            {{ $skripsi->semester }} <br>
                                                            {{ $skripsi->nilai }} <br>
                                                            {{ $skripsi->tanggal_sidang }} <br>
                                                            <embed src="/storage/{{ $skripsi->nama_file }}" width="100%" height="200"
                                                                type="application/pdf">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
@endsection
