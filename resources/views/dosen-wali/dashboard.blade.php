@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @php
                            $dosen = auth()->user()->dosenWali;
                        @endphp
                        <h1>Selamat datang,</h1>
                        <h1 class="m-0"> Dosen {{ $dosen->nama }}!</h1>
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
        <section class="content">
            <div class="container">
                @if ($errors->any())
                    <div class="red-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                </div>
                <div class="col-lg-6">
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
                <div class="row">
                <div class="col-12">  
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"><b>Progress Mahasiswa</b></h2>
                        </div><!-- /.card-header -->   
                        <div class="card-body">
                            <section class="content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="simple-results.html">
                                                <div class="input-group input-group-lg">
                                                    <input type="search" class="form-control form-control-lg" id="search-input" placeholder="Masukkan nama mahasiswa..">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-lg btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="search-result">
                            </div><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table><br>
                            
                            </div>
                        </div><!-- /.card-body -->
                    </section>

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
                    url: '/dosen-wali/search-mahasiswa',
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
