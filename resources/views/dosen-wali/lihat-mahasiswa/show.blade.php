@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Data {{ $mahasiswa->nama }}</h1>
                        <h1 class="m-0"> Semester {{ $mahasiswa->hitungSemester() }}</h1>
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
                    <br>
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

                @for ($i = 1; $i <= $mahasiswa->hitungSemester(); $i++)
                    {{-- @php
                        $irs = IsianRencanaSemester::where('semester', $i)
                            ->where('mahasiswa_id', $mahasiswa->id)
                            ->first();
                        $khs = KartuHasilStudi::where('semester', $i)
                            ->where('mahasiswa_id', $mahasiswa->id)
                            ->first();
                    @endphp --}}

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
                                    <h5 class="modal-title" id="smt-{{ $i }}-modal">Data Akademik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    {{ $irs[$i - 1]->semester }} <br>
                                    {{ $irs[$i - 1]->sks }} <br>
                                    <embed src="/storage/{{ $irs[$i - 1]->nama_file }}" width="100%" height="200"
                                        type="application/pdf">

                                    {{ $khs[$i - 1]->semester }} <br>
                                    {{ $khs[$i - 1]->sks_semester }} <br>
                                    {{ $khs[$i - 1]->sks_kumulatif }} <br>
                                    {{ $khs[$i - 1]->ip_semester }} <br>
                                    {{ $khs[$i - 1]->ip_kumulatif }} <br>
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
                @endfor
            </div>
        </div>
    </div>
@endsection
