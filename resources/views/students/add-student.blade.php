@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('js/add-student') }}"></script>
@endpush

@section('container')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Test</h5>
            <form action="{{ $route }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student-number" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="student-number" id="student-number" maxlength="14">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="batch" class="form-label">Angkatan</label>
                    <input type="text" class="form-control" name="batch" id="batch">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection
