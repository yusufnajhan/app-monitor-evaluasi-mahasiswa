@extends('layouts.main')

@section('user-name')
    @php
        $dosen = auth()->user()->dosenWali;
    @endphp
    {{ $dosen->nama }}
@endsection

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
            </div><!-- /.container -->
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-widget widget-user-2">
                        <div class="widget-user-header bg-navy">
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" style="width: 100px; height: 100px;"
                                    src="public/lte/dist/img/user.jpg" alt="User Avatar">
                            </div>
                            <h3 class="info-box-text"><b>{{ $mahasiswa->nama }}</b></h3>
                            <h5 class="info-box-number"><b>NIM</b> {{ $mahasiswa->nim }} | Semester
                                {{ $mahasiswa->hitungSemester() }} </h5>
                            <h5 class="info-box-number"><b>Status</b> {{ $mahasiswa->status }}</h5>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
            <!-- Main content -->
            <div class="content">
                <div class="d-flex flex-wrap justify-content-center">
                    @for ($i = 1; $i <= 14; $i++)
                        <!-- Button trigger modal -->
                        <button type="button"
                            class="btn
                            @if ($i <= $mahasiswa->hitungSemester())
                            @if ($i == $skripsi->semester)
                                @if ($skripsi->sudah_disetujui == 1)
                                    btn-success
                                @else
                                    btn-danger
                                @endif
                            @elseif ($i == $pkl->semester)
                                @if ($pkl->sudah_disetujui == 1)
                                    btn-warning
                                @else
                                    btn-danger
                                @endif
                            @else
                                @if ($irs[$i - 1]->sudah_disetujui == 1 && $khs[$i - 1]->sudah_disetujui == 1)
                                    btn-primary
                                @elseif ($irs[$i - 1]->sudah_disetujui == 1 || $khs[$i - 1]->sudah_disetujui == 1)
                                    btn-info
                                @else
                                    btn-danger
                                @endif
                            @endif
                        @else 
                            btn-danger
                        @endif
                        
                                {{-- @if ($i <= $mahasiswa->hitungSemester())
                                    @if (!empty($pkl) && $pkl->sudah_disetujui == 1)
                                        btn-warning
                                    @elseif (!empty($skripsi) && $skripsi->sudah_disetujui == 1)
                                        btn-success
                                    @else
                                        btn-primary
                                    @endif
                                @else
                                    btn-danger 
                                @endif --}}
                                btn-lg mr-3"
                            data-toggle="modal"
                            data-target="#smt-{{ $i }}"
                            style="width: 207px; height: 75px;">
                            Semester {{ $i }}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="smt-{{ $i }}" tabindex="-1"
                            aria-labelledby="smt-{{ $i }}-modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="smt-{{ $i }}-modal">Data Akademik Semester
                                            {{ $i }} </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($i <= $mahasiswa->hitungSemester())
                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#detail-irs-{{ $i }}" type="button" role="tab" aria-controls="home" aria-selected="true">
                                                IRS
                                            </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#detail-khs-{{ $i }}" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                KHS
                                            </button>
                                            </li>
                                            @if ($i == $pkl->semester)
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#pkl" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                                PKL
                                            </button>
                                            </li>
                                            @endif
                                            @if ($i == $skripsi->semester)
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#skripsi" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                                Skripsi
                                            </button>
                                            </li>
                                            @endif
                                          </ul>

                                          <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="detail-irs-{{ $i }}" role="tabpanel" aria-labelledby="home-tab">
                                                <!-- mengecek apakah irs sudah disetujui -->
                                            @if ($irs[$i - 1]->sudah_disetujui == 1) 
                                            <b>IRS</b>
                                            <table>
                                                <tr>
                                                    <td>SKS</td>
                                                    <td>{{ $irs[$i - 1]->sks }}</td>
                                                </tr>
                                            </table>
                                            <embed src="/storage/{{ $irs[$i - 1]->nama_file }}" width="100%" height="200"
                                                type="application/pdf">
                                        @else
                                            <b>IRS Belum Disetujui</b><br>
                                            <a href="/dosen-wali/irs/{{ $mahasiswa->nim }}/{{ $irs[$i - 1]->semester }}/setujui">
                                            <button type="button" class="btn btn-block btn-danger">
                                                Setujui IRS disini
                                            </button>
                                        </a>
                                        @endif
                                            </div>
                                            <div class="tab-pane fade" id="detail-khs-{{ $i }}" role="tabpanel" aria-labelledby="profile-tab">
                                                @if ($khs[$i - 1]->sudah_disetujui == 1) 
                                                <b>KHS</b>
                                                <table>
                                                    <tr>
                                                        <td>SKS</td>
                                                        <td>{{ $khs[$i - 1]->sks_semester }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SKS Kumulatif</td>
                                                        <td>{{ $khs[$i - 1]->sks_kumulatif }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IP Semester</td>
                                                        <td>{{ $khs[$i - 1]->ip_semester }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IP Kumulatif</td>
                                                        <td>{{ $khs[$i - 1]->ip_kumulatif }}</td>
                                                    </tr>
                                                </table>
                                                <embed src="/storage/{{ $khs[$i - 1]->nama_file }}" width="100%"
                                                    height="200" type="application/pdf">
                                                    @else
                                                <b>KHS Belum Disetujui</b><br>
                                                <a href="/dosen-wali/khs/{{ $mahasiswa->nim }}/{{ $irs[$i - 1]->semester }}/setujui">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Setujui KHS disini
                                                </button></a>
                                            @endif
                                            </div>
                                            @if ($i == $pkl->semester)
                                            <div class="tab-pane fade" id="pkl" role="tabpanel" aria-labelledby="contact-tab">
                                                @if ($pkl->sudah_disetujui)
                                                <table>
                                                    <tr>
                                                        <td>Nilai</td>
                                                        <td>{{ $pkl->nilai }}</td>
                                                    </tr>
                                                </table>
                                                <embed src="/storage/{{ $pkl->nama_file }}" width="100%"
                                                    height="200" type="application/pdf">
                                                @else
                                                <b>PKL Belum Disetujui</b><br>
                                                <a href="/dosen-wali/progres-pkl/{{ $mahasiswa->nim }}/setujui">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Setujui KHS disini
                                                </button></a>
                                                @endif
                                            </div>
                                            @endif
                                            @if ($i == $skripsi->semester)
                                            <div class="tab-pane fade" id="skripsi" role="tabpanel" aria-labelledby="contact-tab">
                                                @if ($skripsi->sudah_disetujui)
                                                <table>
                                                    <tr>
                                                        <td>Nilai</td>
                                                        <td>{{ $skripsi->nilai }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Sidang</td>
                                                        <td>{{ $skripsi->tanggal_sidang }}</td>
                                                    </tr>
                                                </table>
                                                <embed src="/storage/{{ $skripsi->nama_file }}" width="100%"
                                                    height="200" type="application/pdf">
                                                @else
                                                <b>PKL Belum Disetujui</b><br>
                                                <a href="/dosen-wali/progres-skripsi/{{ $mahasiswa->nim }}/setujui">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Setujui KHS disini
                                                </button></a>
                                                @endif
                                            </div>
                                            @endif
                                          </div>
                                            
                                            <br>
                                            
                                        @else
                                            <p>Semester belum ditempuh</p>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($i % 5 == 0)
                </div><br>
                <div class="d-flex flex-wrap justify-content-center">
                    @endif
                    @endfor
                </div><!-- /.card -->
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection