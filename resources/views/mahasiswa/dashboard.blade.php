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
            </div>
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
                </div>
            </section>
        </div>
    @endsection
