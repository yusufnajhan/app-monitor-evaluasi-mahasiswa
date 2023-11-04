@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Hai Operator {{ auth()->user()->operator->nama }}!</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/tambah-mahasiswa"> Input Data Mahasiswa Baru </a></h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/tambah-doswal"> Input Data Dosen Wali </a></h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="text-center"><a href="/tambah-departemen"> Input Data Departemen </a></h5>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <br>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="text-center"><a href="/status-pengajuan"> Status Pengajuan Ubah Data </a></h5>
                    </div>
                </div><!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="text-center">Pencarian Mahasiswa</h5><br>
                        <form action="enhanced-results.html">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Lorem Ipsum:</label>
                                                <select class="select2" multiple="multiple" data-placeholder="Any"
                                                    style="width: 100%;">
                                                    <option>Lorem Ipsum</option>
                                                    <option>Lorem Ipsum</option>
                                                    <option>Lorem Ipsum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Lorem Ipsum</label>
                                                <select class="select2" style="width: 100%;">
                                                    <option selected>Lorem Ipsum</option>
                                                    <option>Lorem Ipsum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Lorem Ipsum</label>
                                                <select class="select2" style="width: 100%;">
                                                    <option selected>Lorem Ipsum</option>
                                                    <option>Lorem Ipsum</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <input type="search" class="form-control form-control-lg"
                                                placeholder="Type your keywords here" value="Lorem ipsum">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->

            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div>
@endsection

@section('user-name')
    {{ auth()->user()->operator->nama }}
@endsection