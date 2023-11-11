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
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <form action="" method="get">
                                    <input type="search" class="form-control form-control-lg" id="search-input"
                                        placeholder="Type your keywords here">
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
            </section>
            <!-- /.content -->
        </div>
    </div>
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
