@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard Mahasiswa</h1>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>https://github.com/anurhaliza/app-monitor-evaluasi-mahasiswa/pull/9/conflict?name=resources%252Fviews%252Fmahasiswa%252Fdashboard.blade.php&ancestor_oid=5934b9130aac4a7de4dd0c74dc89108e02745193&base_oid=3184cf888e2d1f651783adadfe0f169f1e469afc&head_oid=5ea41ad1dd024c1325e6663b5bf20ed641ae6bb1
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1>Hai</h1>
                    <h2>Ini dasbor mahasiswa</h2>
                    @php
                        $mahasiswa = auth()->user()->mahasiswa;
                    @endphp
                    <h2>Mahasiswa {{ $mahasiswa->nama }}</h2>
                    <h2>Semester {{ $mahasiswa->hitungSemester() }}, semangka</h2>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">
                            Log out
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <br><br>
            <section class="content">
                <div class="container-fluid">
                    <a href="/irs/{{ $mahasiswa->nim }}">IRS Mahasiswa</a>
                    <br>
                    <a href="/khs/{{ $mahasiswa->nim }}">KHS Mahasiswa</a>
                </div>
            </section>
        </div>
    @endsection
