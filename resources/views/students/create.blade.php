@extends('layouts.main')

{{-- @push('scripts')
    <script src="{{ asset('js/add-student.js') }}"></script>
@endpush --}}

@section('container')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Test</h5>
            <form action="{{ $route }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="student-number" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="student-number" id="student-number" maxlength="14"
                        value="{{ old('student-number') }}">
                    @error('student-number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="batch" class="form-label">Angkatan</label>
                    <input type="text" class="form-control" name="batch" id="batch" value="{{ old('batch') }}">
                    @error('batch')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            {{-- @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
    </div>
@endsection
