@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1>Selamat datang,</h1>
                    <h2>Dosen {{ auth()->user()->dosenWali->nama }}!</h2>
                </div><!-- /.container-fluid -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="text-center"><a href="dosen-wali/daftar-mahasiswa">Daftar Mahasiswa</a>
                                        </h5>
                                    </div>
                                </div><!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="text-center"><a href="dosen-wali/setujui-irs">Setujui IRS</a>
                                        </h5>
                                    </div>
                                </div><!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="text-center"><a href="dosen-wali/setujui-khs">Setujui KHS</a>
                                        </h5>
                                    </div>
                                </div><!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="text-center"><a href="dosen-wali/setujui-pkl">Setujui PKL</a>
                                        </h5>
                                    </div>
                                </div><!-- /.card -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="text-center"><a href="dosen-wali/setujui-skripsi">Setujui Skripsi</a>
                                        </h5>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    @endsection
