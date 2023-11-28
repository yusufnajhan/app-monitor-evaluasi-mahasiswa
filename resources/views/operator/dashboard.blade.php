@extends('layouts.main')
@section('user-name')
    @php
        $operator = auth()->user()->operator;
    @endphp
    {{ $operator->nama }}

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3> Dashboard</h3>
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
                            <img class="img-circle elevation-2" src="/storage/{{ $user->operator->foto_profil }}"
                                alt="User Avatar">
                        </div>
                        <h3 class="info-box-text"><b>{{ $operator->nama }}</b></h3>
                        <h5 class="info-box-number"><b>NIP</b> {{ $operator->nip }} </h5>
                    </div>
                </div><!-- /.container -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center"><a href="/tambah-mahasiswa"> Input Data Mahasiswa Baru </a></h5>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="text-center">
                                        <a href="/operator/ubah-status-mahasiswa">
                                            Ubah Status Mahasiswa
                                        </a>
                                    </h5>
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
                            <h5 class="text-center"><b>Pencarian Mahasiswa<b></h5><br>
                            <form action="enhanced-results.html">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="row">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-lg">
                                                <form action="" method="get">
                                                    <input type="search" class="form-control form-control-lg"
                                                        id="search-input" placeholder="Type your keywords here">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-lg btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="search-result">
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

    @section('script')
        <script>
            $(document).ready(function() {
                $('#search-input').on('input', function(e) {

                    let keyword = $(this).val();
                    if (keyword.trim() === '') {
                        clearResult();
                        return;
                    }

                    $.ajax({
                        type: 'GET',
                        url: '/operator/search-mahasiswa',
                        data: {
                            keyword: keyword
                        },
                        success: function(response) {
                            displayResults(response.results);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

                function displayResults(results) {
                    let resultContainer = $('.search-result');
                    resultContainer.empty();

                    if (results.length > 0) {
                        for (let i = 0; i < results.length; i++) {
                            resultContainer.append(`<p>${results[i].nama}</p>`);
                        }
                    } else {
                        resultContainer.append(`<p>Tidak ada hasil</p>`);
                    }
                }

                function clearResult() {
                    let resultContainer = $('.search-result');
                    resultContainer.empty();
                }
            });
        </script>
    @endsection
@endsection
